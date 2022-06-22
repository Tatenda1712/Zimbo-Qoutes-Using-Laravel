<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qoutes;

class QoutesController extends Controller
{
    //get qoutes
    function getQoutes(){
        return response()->json(Qoutes::all(),200);
    }
    //get qoutes by id
    function getQouteById($id){
        $qoute= Qoutes::find($id);
        if(is_null($qoute)){
            return response()->json(['message'=>'Qoute not found'],404);
        }
        return response()->json($qoute::find($id),200);
    }
    //delete qoutes

    function deleteQoute(Request $req, $id){
       $qoute= Qoutes::find($id);
        if(is_null($qoute)){
            return response()->json(['message'=>'Qoutes not found',404]);
        }    
       $qoute->delete();
       return response()->json(null,204);
    }

    //update qoutes
    function updateQoute(Request $req, $id){
        $qoute= Qoutes::find($id);
        if(is_null($qoute)){
            return response()->json(['message'=>'Qoute not found'],404);
        }
        $qoute->update($req->all(),200);
    }
    //add qoute
    function addQoute(Request $req){
     $qoute=Qoutes::create($req->all());
     return response($qoute,201);
    }

    //add like

    function addLike( $id){
        $qoute = Qoutes::find($id);
        if(is_null($qoute)){
            return response()->json(['message'=>'Qoutes not found',404]);
        }    
        $qoute->likes = $qoute->likes+1;
        $qoute->save();
        return response($qoute,200);
    }

    //subtract like

    function substractLike($id){
        $qoute = Qoutes::find($id);
        if(is_null($qoute)){
            return response()->json(['message'=>'Qoutes not found',404]);
        }    
        $qoute->likes = $qoute->likes-1;
        $qoute->save();
        return response($qoute,200);
    }
// login user
    public function login(Request $req){
        $user = User:: where('phonenumber','=',$req->phonenumber)->first();
        if($user){
           return response()->json(['message'=>'You have Successfully logged in']);
        }
        else{
            return response()->json(['message'=>'Phone Number not registered']);
        }
    }

}
