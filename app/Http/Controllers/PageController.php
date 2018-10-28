<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('welcome');
    }

    // public function recent(){
    //     return view('questions.index');
    // }

    public function about()
    {
        return "About Us page";
    }

   

    public function contact()
    {
        return "Contact Us page";
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('profile')->with('user', $user);
    }

}
