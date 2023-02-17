<?php
namespace Modules\Dashboard\src\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeAdminController extends Controller{
    public function index(){
        $title = "Dashboard";
        return view('Dashboard::home',compact('title')) ;
    }

}
