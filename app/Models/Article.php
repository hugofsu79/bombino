<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gamme_id',
        'name',
        'ingredients',
        'allergens',
        'image',
        'price',
        'highlighted'
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class,'commandes_articles')->withPivot(array('quantity'));
    }

    public function gamme()
    {
        return $this->belongsTo(Gamme::class);
    }
}
