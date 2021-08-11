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

    public function show(string $slug)
    {
        return Page::where("slug", $slug)->first();
    }

    public function store(Request $request)
    {
        return Page::create($request->all());
    }

    public function update(Request $request, string $slug)
    {
        $page = Page::where("slug", $slug)->first();
        $page->update($request->all());
        return $page;
    }

    public function delete(Request $request, string $slug)
    {
        $page = Page::where("slug", $slug)->first();
        $page->delete();

        return 204;
    }
}
