<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
/**
 * Controllers For the sections 
 * Handles the CRUD Operations
 */
class SectionController extends Controller
{
    public function index(int $pageId){
        $section = Section::where("page_ID",  $pageId);
        return json_encode($section);
    }
    public function show(int $id){
        $section = Section::find($id);
        return $section;
    }

    public function store(Request $request) {
        return Section::create($request->all());
    }
    public function update(Request $request, int $id){
        $section = Section::find($id);
        $section->update($request->all());
        return $section;
    }
    public function delete(Request $request, int $id){
        $section = Section::find($id);
        $section->delete();
        return 204;
    }
}
