<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InclusionController extends Controller
{
    public function __construct(){

    }

    public function index(){
        return view('admin.inclusion.index');
    }

}
