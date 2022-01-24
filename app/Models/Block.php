<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ["slug", "content","page_ID"];

    public function page()
    {
        return $this->belongsTo(Page::class,"page_ID");
    }
}
