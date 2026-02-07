<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;

class EstudanteController extends Controller
{
    //
    public function registerEstudante(Request $request){
      $estudante = Estudante::create([
        "name"=> $request->input("name"),
        "idade"=> $request->input("idade"),
        "curso"=> $request->input("curso"),
      ]);
      return response()->json([
        "data"=> $estudante,
      ]);
    }
    public function visualizarEstudante(Request $request)
    {  $estudante = Estudante::query();
     if($request->has("search")){
        $search = $request->input("search");
        $estudante->where("name","like","%".$search."%")->orWhere("curso","like","%".$search."%");
     }
        return response()->json([
            "data"=> $estudante->get()
        ]);

    }  
    public function updateEstudante(Request $request, $id){
        $estudante = Estudante::findOrFail($id);
        $estudante->update(["name"=> $request->input("name"),
        "idade"=> $request->input("idade"),
        "curso"=> $request->input("curso")]);
        return response()->json([
            "data"=> $estudante,
            ]);
    }
    public function deleteEstudante($id){
        $estudante = Estudante::findOrFail($id);
        $estudante->delete();
        return response()->json([
            "mensagem"=> "Aluno eliminado com sucesso!!!",
            ]);
    }
    public function relatorioEstudante(){
        $totalEstudante = Estudante::query()->count();
        $estudante = Estudante::get();  
        return response()->json([
            "mensagem"=>"Relatório dos Estudantes",
            "total"=> $totalEstudante,
            "estudante"=>$estudante,
        
        ]);

    }

}
