<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;

class TicketsController extends Controller
{
    public function listadoSinCerrar(){
        
        $tickets = Ticket::select(
            "tik_id",
            "tik_fechacreacion",
            "tik_fechamodif", 
            "tik_clientecod",
            "tik_cliente",
            "tik_abonado",
            "tik_contacto",
            "tik_tel",
            "tik_email",
            "tik_estado",
            "tik_usu",
            "tik_tipo",
            "tik_modulo",
            "tik_tema",
            "tik_notes"
        )
        ->where("tik_estado","<>","C")
        ->orderBy("tik_id","desc")
        ->get();

        return response()->json($tickets); 
    }

     public function porId($id){
        
        $ticket = Ticket::select(
            "tik_id",
            "tik_fechacreacion",
            "tik_fechamodif",            
            "tik_cliente",
            "tik_abonado",
            "tik_contacto",
            "tik_tel",
            "tik_email",
            "tik_estado",
            "tik_usu",
            "tik_tipo",
            "tik_modulo",
            "tik_tema",
            "tik_notes"
        )
        ->where("tik_id","=","$id")
        ->get();

        return response()->json($ticket); 
    }
}
