<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Models;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index_page()
    {
        return view('index');
    }

    public function contacts_page()
    {
        return view('contacts');
    }

    public function about_us_page()
    {
        return view('about_us');
    }

}
