<?php

namespace App\Http\Controllers;
use App\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    function addSinger(){
        $name="Tùng Dương";
        $title="Tung-Duong";
        Singer::addSinger($name, $title);
    }
}
