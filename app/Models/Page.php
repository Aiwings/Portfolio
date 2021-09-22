<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Page Model
 * On its own it only inclueds its title and description used for SEO purposes
 * Slugs are used for better URL writing though ID are always used for managements (CRUD)
 * It is linked with its sections and Blocks
 */
class Page extends Model
{
    protected $fillable = ["slug", "title", "description"];
}
