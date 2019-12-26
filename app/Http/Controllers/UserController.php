<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->search){
            $search=$request->search;
        }else{
            $search="";
        }

        $users = User::where('email_verified_at', '<>',null)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('username', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            })
            ->paginate(10);
        return view('users.index')->with(compact('users'));
    }
}
