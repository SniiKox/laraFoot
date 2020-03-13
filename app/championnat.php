<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class championnat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle', 'pays',
    ];

    public function equipes()
    {
        return $this->hasMany(Equipe::class);
    }
}
