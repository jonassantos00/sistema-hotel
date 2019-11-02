<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Auth;

class FuncionariosController extends Controller
{
    public function index(){
        $funcionarios = Funcionario::orderBy('id', 'desc')->get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function cadastrar(Request $request){
        $request->validate([
            'nome' => 'required',
            'dataNascimento' => 'required',
            'cpf' => 'required|digits:11|numeric',
            'cargo' => 'required',
            'email' => 'required|email',
            'senha' => 'required',
            'confirmarSenha' => 'required|same:senha',
            'status' => 'required',
        ]);
        try {
            // Cadastrar Funcionário
                $funcionario = new Funcionario;
                $funcionario->nome              = $request->nome;
                $funcionario->data_nascimento   = $request->dataNascimento;
                $funcionario->cpf               = $request->cpf;
                $funcionario->cargo             = $request->cargo;
                $funcionario->email             = $request->email;
                $funcionario->password          = bcrypt($request->senha);
                $funcionario->status            = $request->status;
                $funcionario->save();

                return redirect()
                            ->back();
        } catch (\Exception $e) {
            // Retornar erro
            return redirect()
                            ->back()
                            ->with('error', 'Erro ao cadastrar Funcionário!'.$e);
        }  
    }

    public function editar($idFuncionario){
        $idFuncionario = (int) $idFuncionario;
        $funcionario = Funcionario::findOrFail($idFuncionario);
        return view('funcionarios.editar', compact('funcionario'));
    }

    public function atualizar(Request $request, $idFuncionario){
        $request->validate([
            'nome' => 'required',
            'dataNascimento' => 'required',
            'cpf' => 'required|digits:11|numeric',
            'cargo' => 'required',
            'email' => 'required|email',
            'status' => 'required',
        ]);
        $idFuncionario = (int) $idFuncionario;
        
        try {
            $funcionario = Funcionario::find($idFuncionario);
            $funcionario->nome              = $request->nome;
            $funcionario->data_nascimento   = $request->dataNascimento;
            $funcionario->cpf               = $request->cpf;
            $funcionario->cargo             = $request->cargo;
            $funcionario->email             = $request->email;
            $funcionario->status            = $request->status;
            $funcionario->save();
            return redirect()
                            ->back()
                            ->with('success', 'Dados atualizados com Sucesso');

        } catch (\Exception $e) {
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao atualizar dados do Funcionário!'.$e);


        }

    }

    public function excluir(Request $request){

        $idFuncionario = (int) $request->idFuncionario;
        $idUsuario = Auth::user()->id;

        //Verifica se o usuário não esta tentando se excluir 
         if($idUsuario == $idFuncionario){
             return redirect()->back()->with('error', 'Você não esta autorizado a se Excluir');
         }

        try {
            $funcionario = Funcionario::findOrFail($idFuncionario);
            $funcionario->delete();

            return redirect()
                        ->back();

        } catch (\Exception $e) {
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao excluir Funcionário!');
        }



    }


}
