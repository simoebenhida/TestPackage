<?php

namespace Laravel\Blog\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$message = "Is A Message";
    	return view('blog::home',compact('message'));
    }
}