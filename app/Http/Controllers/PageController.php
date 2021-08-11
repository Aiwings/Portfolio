<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return Page::all();
    }

    public function show($name)
    {
        return Page::where("name", $name)->first();
    }

    public function store(Request $request)
    {
        return Page::create($request->all());
    }

    public function update(Request $request, $name)
    {
        $page = Page::where("name", $name)->first();
        $page->update($request->all());
        return $page;
    }

    public function delete(Request $request, $name)
    {
        $page = Page::where("name", $name)->first();
        $page->delete();

        return 204;
    }
}
