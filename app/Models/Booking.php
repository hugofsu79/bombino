<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    

    public function users()
    {
        return $this->belongsTo(User::class);
    }

     //nom au pluriel car plusieurs articles peuvent être associés à plusieurs commandes
    // cardinalité 1,n
    public function booking()
    {
        //withPivot(array('quantite','reduction')) = car on rajoute 2 champs supplémentaires : quantite et reduction
        return $this->belongsToMany(Article::class,'commandes_articles')->withPivot(array('seats','hour'));
    }
}
