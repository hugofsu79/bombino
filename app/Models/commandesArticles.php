<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandesArticles extends Model
{
    use HasFactory;


    public function Article()
    {
        return $this->hasMany(articles::class);
    }

    public function articles()
    {
        //withPivot(array('quantite','reduction')) = car on rajoute 2 champs supplémentaires : quantite et reduction
        return $this->belongsToMany(Article::class, 'commandes_articles')->withPivot(array('quantity'));
    }
}
