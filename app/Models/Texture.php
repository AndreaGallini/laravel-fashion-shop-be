<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Texture extends Model
{
    use HasFactory;

    protected $guarded = ['name'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }
}
