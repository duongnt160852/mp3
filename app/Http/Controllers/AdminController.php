<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

class AdminController extends Controller
{
    function insertAdmin(){
        Admin::insert("admin","123456","admin@gmail.com","admin","1");
    }
}
