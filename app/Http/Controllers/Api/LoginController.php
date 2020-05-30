<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public $successStatus = 200;

    public function login(){
   
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json($success, $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logoutApi(){   
          
        $user = Auth::user()->token();    
            if($user->revoke()){
                return response()->json(['success' => true], 200);
            }else {
                return response()->json(['error'=>'error'], 401);
            }
    }
}
