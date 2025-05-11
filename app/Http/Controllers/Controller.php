<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

class DataUserController extends Controller
{
    public function index()
    {
        return view('data_user.users');
    }
}