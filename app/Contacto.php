<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $table="Contactos";
    public $primaryKey="cot_cod";
    public $timestamps= false;
    public $attributes=[];
    public $guarded=[];
}
