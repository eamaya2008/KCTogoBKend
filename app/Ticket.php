<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $table="ticket_cab";
    public $primaryKey="tik_id";
    public $timestamps= false;
    public $attributes=[];
    public $guarded=[];
}
