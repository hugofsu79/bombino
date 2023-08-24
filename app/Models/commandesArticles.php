<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandesArticles extends Model
{
    use HasFactory;


    public function Article()
    {
        return $this->hasMany(Article::class, 'commandes_articles')->withPivot(array('quantity'));
    }

    public function Commande()
    {
        return $this->belongsTo(commandes::class);
    }
}
