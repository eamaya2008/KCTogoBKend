<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vendedor;

class VendedoresController extends Controller
{
    public function listadoActivos(){

     $vendedores=Vendedor::select(
        "vendedor.ven_cod",
        "ven_desc"
         )
         ->join("dtsvendedor","vendedor.ven_cod","=","dtsvendedor.ven_cod")
         ->where("dven_activo","=", "1")
         ->orderBy("ven_cod","asc")
         ->get();
      return response()->json($vendedores);
   }
}
