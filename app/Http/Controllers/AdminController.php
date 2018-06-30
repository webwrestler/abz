<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $users = User::paginate(1000);
        return view('admin.index', ['users'=>$users]);
    }

    public function create(Request $request)
    {
        if($request->method() == "GET")
        {
            $chiefs = User::getChiefs();
            return view('admin.create', ['chiefs'=>$chiefs]);
        } else{
            $user = new User;
            $user->createNewUser($request);
            return view('welcome');
        }
    }

    public function update($id, Request $request)
    {
        if($request->method() == "GET")
        {
            $user = User::find($id);
            $chiefs = User::getChiefs();

            return view('admin.update', ['user'=>$user, 'chiefs'=>$chiefs]);
        } else{

            $user = new User;
            $user->updateUserId($id, $request);
            return redirect()->route('index');
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin');
    }
}