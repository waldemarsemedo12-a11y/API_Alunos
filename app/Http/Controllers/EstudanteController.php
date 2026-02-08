<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudanteRequest;
use Illuminate\Http\Request;
use App\Models\Estudante;

class EstudanteController extends Controller
{
    //
    public function registerEstudante(EstudanteRequest $request){
      $estudante = Estudante::create($request->validated());
      return response()->json([
        "mensagem"=>'Aluno registado com sucesso !!!',
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
            "mensagem"=>'Alunos encontrados com sucesso !!!',
            "data"=> $estudante->get()
        ]);

    }  
    public function updateEstudante(EstudanteRequest $request, $id){
        $estudante = Estudante::find($id);
        if(!$estudante){
           return response()->json([
            "mensagem"=>'Este ID não está vinculado a nenhum aluno !!!',
           ]); 
        }
        $estudante->update($request->validated());
        return response()->json([
            "mensagem"=>'Alunos actualizados com sucesso !!!',
            "data"=> $estudante,
            ]);
    }
    public function deleteEstudante($id){
         $estudante = Estudante::find($id);
        if(!$estudante){
           return response()->json([
            "mensagem"=>'Este ID não está vinculado a nenhum aluno !!!',
           ]); 
        }
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
