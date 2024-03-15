<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SocialLinks;
use App\Models\Banner;
use App\Models\HomeSection2;


class PagesController extends Controller
{
    public function login()
    {
        return view('admin.pages.login');
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function allpages()
    {
        return view('admin.pages.allpages');
    }

    public function addpage()
    {
        return view('admin.pages.addpage');
    }
}

