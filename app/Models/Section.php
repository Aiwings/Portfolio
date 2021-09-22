<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Model for the Sections
 * Sections are HTML Content generated through TinyMCE Editor 
 * The title can be used or not - IDK Yet
 * IDEM Id for modifs / Slug for URLS on READ
 */
class Section extends Model
{
   protected $fillable = ["slug","title","content"];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
