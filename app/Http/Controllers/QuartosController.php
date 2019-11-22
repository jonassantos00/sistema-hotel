<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quarto;

class QuartosController extends Controller
{
    public function index(){
        $quartos = Quarto::orderBy('id', 'desc')->get();
        return view('quartos.index', compact('quartos'));
    }

    public function cadastrar(Request $request){
        $request->validate([
            'numeroQuarto' => 'required|numeric',
            'qtdCamas' => 'required|numeric',
            'preco' => 'required|numeric',
            'descricao' => 'required',
        ]);

        try {
            
            $quarto = new Quarto;
            $quarto->numero_quarto  = $request->numeroQuarto;
            $quarto->qtd_camas      = $request->qtdCamas;
            $quarto->preco          = $request->preco;
            $quarto->descricao      = $request->descricao;
            $quarto->status         = 'Disponível';
            $quarto->save();

            return redirect()
                    ->back()
                    ->with('success', 'Quarto '.$request->descricao.' cadastrado.');

        } catch (\Exception $e) {

            return redirect()
                    ->back()
                    ->with('error', 'Erro ao cadastrar Quarto');

        }


    }
    public function editar($idQuarto){
        $idQuarto = (int) $idQuarto;
        $quarto = Quarto::findOrFail($idQuarto);

        return view('quartos.editar', compact('quarto'));
    }

    public function atualizar(Request $request, $idQuarto){
        $request->validate([
            'qtdCamas' => 'required|numeric',
            'preco' => 'required|numeric',
            'descricao' => 'required',
        ]);

        $idQuarto = (int) $idQuarto;

        try {

            $quarto = Quarto::find($idQuarto);
            $quarto->qtd_camas  = $request->qtdCamas;
            $quarto->preco      = $request->preco;
            $quarto->descricao  = $request->descricao;
            $quarto->save();

            return redirect()
                    ->back()
                    ->with('success', 'Dados atualizados com sucesso!');
            
            
        } catch (\Exception $e) {
            
            return redirect()
                    ->back()
                    ->with('error', 'Erro ao atualizar quarto');

        }


    }



    public function excluir(Request $request){
        try {
            $quarto = Quarto::findOrFail($request->idQuarto);
            $quarto->delete();

            return redirect()
                        ->back()
                        ->with('success', 'Quarto removido com sucesso.');

        } catch (\Exception $e) {
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao excluir Quarto!');
        }
    }


}
