<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillables = ["slug", "content"];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
