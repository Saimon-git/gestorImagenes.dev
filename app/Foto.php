<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Foto extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fotos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre', 'descripcion', 'ruta','album_id'];

    public function album()
    {
        return $this->hasMany('App\Album');
    }

}
