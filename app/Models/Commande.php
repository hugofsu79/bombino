<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'price',
        'hour'
    ];

    //nom au singulier car une commande peut être associée qu'à un user
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
