<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $req){
        // $req->validate([
        //     'name'=>'required|string',
        //     'phonenumber'=>'required|integer|unique:users',
        //     'password'=>'require|string|min:6'
        // ]);
        $user= new User([
            'name'=>$req->name,
            'phonenumber'=>$req->phonenumber,
            'password'=>Hash::make($req->password)
        ]);
        $user->save();
        return response()->json(['message'=>"You have been registered successfully"],200);
    }
    public function login(Request $req){
        // $req->validate([
        //     'phonenumber'=>'required',
        //     'password'=>'require|string|min:6'
        // ]);

        $user = User:: where('phonenumber','=',$req->phonenumber)->first();
        if(is_null($user)){
            return response()->json(['message'=>'Phone number not registered']);
        }
        
                if(Hash::check($req->password,$user->password)){
                    return response()->json(["message"=>"log in success"]);
                }
                else{
                    return response()->json(['message'=>'Incorrect Password']);
                }
            }
          
    }
    

