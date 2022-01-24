<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
/**
 * Controllers for the Pages 
 * 
 */
class PageController extends Controller
{
    public function index()
    {
        return Page::all();
    }

    public function show(int $id)
    {
        return Page::find($id);
    }

    public function store(Request $request)
    {
        return Page::create($request->all());
    }

    public function update(Request $request, int $id)
    {
        $page = Page::find($id);
        $page->update($request->all());
        return $page;
    }

    public function delete(Request $request, int $id)
    {
        $page = Page::find($id);
        $page->delete();

        return 204;
    }
}
