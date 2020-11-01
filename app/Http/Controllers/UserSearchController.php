<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = null)
    {
        if($name == null){
            return;
        }else{
            $username = User::select('name', 'id')->where('name', 'like', "%$name%")->get();
            return response()->json($username);
        }
    }
}
