<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function index(int $pageId){
        return Section::where("page_ID",$pageId);
    }

    public function store(Request $request) {
        return Section::create($request->all());
    }
    public function update(Request $request, string $slug){
        $section = Section::where("slug",$slug)->first();
        $section->update($request->all());
        return $section;
    }
    public function delete(Request $request, string $slug){
        $section = Section::where("slug",$slug)->first();
        $section->delete();
        return 204;
    }
}
