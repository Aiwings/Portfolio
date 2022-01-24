<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;
use App\Models\Block;

class HomeController extends Controller
{
    public function index($slug = "home")
    {

        $page = Page::where('slug',$slug)->first();
       
        $sections = Section::where('page_ID',$page->id)->get();
        $blocks = Block::where('page_ID',$page->id)->get();
        return view('home', [
            "page"=>$page,
            "sections"=>$sections,
            "blocks"=>$blocks
        ]);
    }
    public function admin($slug = "" ) {
        return view('admin');
    }
}
