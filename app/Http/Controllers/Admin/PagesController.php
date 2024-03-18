<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialLinks;
use App\Models\Banner;
use App\Models\HomeSection2;
use App\Models\User;

class PagesController extends Controller
{
    public function login(){
        return view('admin.pages.login');
    }

    public function index(){
        $member = User::where('member',1)->count();
        $partner = User::where('partner',1)->count();
        $sponsor = User::where('sponsor',1)->count();
        return view('admin.pages.dashboard',get_defined_vars());
    }

    public function allpages(){
        return view('admin.pages.allpages');
    }

    public function addpage(){
        return view('admin.pages.addpage');
    }
}

