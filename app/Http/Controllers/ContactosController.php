<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Contacto;

class ContactosController extends Controller
{
    public function lista(){

     $contacto=Contacto::select(
        "cotcli_codigo",
        "cli_razsoc",
        "cot_codigo", 
        "cot_nombre",
        "cot_email",
        "cot_telefono"
         )
         ->join("clientes","cotcli_codigo","=","cli_cod")
         ->orderBy("cot_nombre","asc")
         ->get();
      return response()->json($contacto);
   }

   public function porPagina(){
      $contacto=Contacto::select(
        "cotcli_codigo",
        "cli_razsoc",
        "cot_codigo", 
        "cot_nombre",
        "cot_email",
        "cot_telefono"
         )
         ->join("clientes","cotcli_codigo","=","cli_cod")         
         ->orderBy("cot_nombre","asc")
         ->paginate(13);
      return response($contacto, 200);
   }

   public function porCotCod($cotCod){

       $contactos=Contacto::select(
        "cotcli_codigo",
        "cli_razsoc",
        "cot_codigo", 
        "cot_nombre",
        "cot_email",
        "cot_telefono"
         )
         ->join("clientes","cotcli_codigo","=","cli_cod")
         ->where("cot_codigo","=",$cotCod)
         ->get();
      return response()->json($contactos);
   }

   public function porEmpresa($razSoc){
      $contacto=Contacto::select(
        "cotcli_codigo",
        "cli_razsoc",
        "cot_codigo", 
        "cot_nombre",
        "cot_email",
        "cot_telefono"
         )
         ->join("clientes","cotcli_codigo","=","cli_cod")
         ->where("cli_razsoc","like","%$razSoc%")
         ->orderBy("cli_razsoc","asc")
         ->paginate(13);
      return response()->json($contacto);
   }

    public function porNombre($nombre){
      $contacto=Contacto::select(
        "cotcli_codigo",
        "cli_razsoc",
        "cot_codigo", 
        "cot_nombre",
        "cot_email",
        "cot_telefono"
         )
         ->join("clientes","cotcli_codigo","=","cli_cod")
         ->where("cot_Nombre","like","%$nombre%")
         ->orderBy("cot_nombre","asc")        
         ->paginate(13);
      return response()->json($contacto);
   }

   public function porCliCod($cliCod){
      $contacto=Contacto::select(
        "cotcli_codigo",
        "cot_codigo", 
        "cot_nombre",
        "cot_email",
        "cot_telefono"
         )
         ->where("cotcli_codigo","=","$cliCod")
         ->orderBy("cot_nombre","asc")
         ->get();
      return response()->json($contacto);
      }

   /**/
   /*ALTA CONTACTO*/
   public function altaContacto(Request $req){
    
        $contactoNuevo = new Contacto();

        $ultimoID = Contacto::select(
            "cot_codigo"
        )
        ->orderBy("cot_codigo", "desc")
        ->take(1)
        ->get();

        $proximoIDsinEspacios = $ultimoID[0]->cot_codigo + 1;
        $proximoIDEspaciado = "           ".$proximoIDsinEspacios;
        $idContacto = "CASA".substr($proximoIDEspaciado, -11);

        $cotCliCodEspaciado = "000000".$req["cotcli_codigo"];
        $cotCliCod=substr($cotCliCodEspaciado, -6);
               
        
      $reglas=[
          'cot_nombre' => 'required|string|max:30',
          'cot_email' => 'required|string|max:50',
          'cot_telefono' => 'string|max:50',      
      ];

      $mensajes = [
        'required' => "El campo :attribute es obligatorio",
        'max' => "El campo :attribute acepta hasta :max"
      ];

      $this->validate($req, $reglas,$mensajes);

      $contactoNuevo->cotemp_codigo="CASA";
      $contactoNuevo->cotsuc_cod=" ";
      $contactoNuevo->cot_codigo=$proximoIDsinEspacios;
      $contactoNuevo->cot_idcontacto=$idContacto;
      $contactoNuevo->cotcli_codigo=$cotCliCod;
      $contactoNuevo->cot_nombre=$req["cot_nombre"];
      $contactoNuevo->cot_email=$req["cot_email"];
      //$cot_otrosdatos      
      $contactoNuevo->cotusu_codigo="ESTEBAN";
      $contactoNuevo->cot_fecmod=Carbon::now();
      $contactoNuevo->cot_telefono=$req["cot_telefono"];
      // $contactoNuevo->cot_celular=$req["cot_celular"];
      //$cotcar_codigo
      $contactoNuevo->cot_principal=0;

      $contactoNuevo->save();

      return response()->json(201);
   }

   public function modiContacto(Request $req){

      $contacto = Contacto::find($req["cot_codigo"]);

      $contacto->where('cot_codigo', $req["cot_codigo"])
               ->update([
                  "cot_Nombre"=>$req["cot_nombre"],
                  "cot_EMail"=>$req["cot_email"],
                  "cot_Telefono"=>$req["cot_telefono"]
               ]);

      return response()->json(201);
   }
}
