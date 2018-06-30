<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

        if($request->ajax())
        {
            $users = User::getListUser();
            return response()->json($users);
        } else{
            return view('welcome');
        }
    }
}
