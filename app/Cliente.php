<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="Clientes";
    protected $primaryKey="cli_cod";
    public $timestamps= false;
    protected $attributes=[];
    protected $guarded=[];

}
