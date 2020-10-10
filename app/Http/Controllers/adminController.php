<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\admin;

class adminController extends Controller
{
   
    public function index(){
     $admins=admin::all();
        return view('index',compact('admins'));
    }
    //////////////////////////////////
    public function indexLogin(){
        return view('login');
    }
//////////////////////////////////////////////////////////////
    public function login(Request $request){
$admins=admin::where('name',$request->name)->where('password',$request->password)->get()->toArray();
if($admins){
$request->session()->put('admin_session',$admins[0]['id']);
return redirect('/Dashboard');

}else {
    
    session()->flash('msg', 'Name And Password Not Match');
    return redirect('/loginPage')->withInput();
    
    
}
    }
////////////////////////////////

}
