<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class PageController extends Controller
{

    public function welcome(Request $request) {
        if($request->user()) {
            return redirect('/books');
        }
        return view('welcome');
    }

    /**
    *
    */
    public function help() {
        return 'This page will show help information';
    }
    /**
    *
    */
    public function faq() {
        return 'This page will show a list of frequently asked questions';
    }

} #end of class
