<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    public $table="vendedor";
    public $primaryKey="ven_cod";
    public $timestamps= false;
    public $attributes=[];
    public $guarded=[];
}
