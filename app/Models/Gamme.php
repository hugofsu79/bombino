<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamme extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function firstarticle()
    {
        return $this->hasOne(Article::class);
    }
}
