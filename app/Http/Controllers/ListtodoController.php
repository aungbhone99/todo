<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Listtodo;
use Illuminate\Support\Facades\Auth;

class ListtodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $user=Auth::user();
        $data= Listtodo::where('user_id',$user->id)->
            orderBy('check_id', 'ASC')->latest()->get();
        return view('lists.index',['listtodos'=> $data,'user'=>$user->id]);
    }
    public function create(){
        $validator = validator(request()->all(),[
            'body'=>'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $listtodo = new Listtodo;
        $listtodo->body = request()->body;
        $listtodo->user_id=auth()->user()->id;
        // $listtodo->category_id= request()->category_id;
        $listtodo->save();
        return redirect('/lists')->with("info", "A list added.");
    }
    public function delete($id){
        $listtodo = Listtodo::find($id);
        $listtodo->delete();
        return redirect('/lists');
    }
    public function edit($id){
        $listtodo = Listtodo::find($id);

        return view('lists.edit',['list'=>$listtodo]);
    }
    public function update($id){
        $listtodo = Listtodo::find($id);
        $listtodo->body = request()->body;
        $listtodo->save();

        return redirect('/lists');

    }
    public function checkbox($id){
        $listtodo = Listtodo::find($id);
        if($listtodo){
            if($listtodo->check_id){
                $listtodo->check_id=0;
            }else{
                $listtodo->check_id=1;
            }
        $listtodo->save();
        }
        return back();
    }

}
