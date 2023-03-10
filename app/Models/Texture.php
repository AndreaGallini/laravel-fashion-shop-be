<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Texture extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'textures';

    public static function generateSlug($name) {
        return Str::slug($name, '-');
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
