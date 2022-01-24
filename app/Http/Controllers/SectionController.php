<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
/**
 * Controllers For the sections 
 * Handles the CRUD Operations
 */
class SectionController extends Controller
{
    public function index(int $pageId){
        $sections_list = DB::table('sections')->pluck('slug');
        return $sections_list;
    }
    public function show(string $slug){
        $section = Section::where('slug', '=', $slug)->firstOrFail();
        return json_encode($section);
    }

    public function store(Request $request) {
        return Section::create($request->all());
    }
    public function update(Request $request, int $id){
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return $section;
    }
    public function delete(Request $request, int $id){
        $section = Section::findOrFail($id);
        $section->delete();
        return 204;
    }
}
