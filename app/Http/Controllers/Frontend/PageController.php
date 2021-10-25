<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pageShow($page_slug)
    {
        // return $_SERVER['SERVER_NAME'];
        $page =  Page::with('pageTranslation')->where('slug',$page_slug)->first();
        return view('frontend.pages.page',compact('page',$page));
    }
}
