<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

class ClientesController extends Controller
{
   public function lista(){

        $clientes=Cliente::select(
         "cli_razsoc",
         "cli_cod"
         )
         ->orderBy("cli_razsoc","asc")
         ->get();
        return response()->json($clientes);

   }

   public function porRazSoc($razSoc){
      $clientes=Cliente::select(
         "cli_razsoc",
         "cli_cod"
         )
         ->where("cli_razsoc","like","%$razSoc%")
         ->orderBy("cli_razsoc","asc")
         ->get();
      return response()->json($clientes);
   }
}
