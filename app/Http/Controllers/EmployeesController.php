<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Models\Employee;
	use Auth;
	use mysql_xdevapi\Exception;

	class EmployeesController extends Controller
	{
		public function index()
		{
			$employees = Employee::orderBy('id', 'desc')->get();
			return view('employees.index', compact('employees'));
		}

		public function add(Request $request)
		{
			$request->validate([
				'nome'           => 'required', 'dataNascimento' => 'required', 'cpf' => 'required|digits:11|numeric',
				'cargo'          => 'required', 'email' => 'required|email', 'senha' => 'required',
				'confirmarSenha' => 'required|same:senha', 'status' => 'required',
			]);
			try {
				// Cadastrar Funcionário
				$employee = new Employee;
				$employee->nome = $request->nome;
				$employee->data_nascimento = $request->dataNascimento;
				$employee->cpf = $request->cpf;
				$employee->cargo = $request->cargo;
				$employee->email = $request->email;
				$employee->password = bcrypt($request->senha);
				$employee->status = $request->status;
				$employee->save();

				return redirect()->back();
			} catch (\Exception $e) {
				return redirect()->back()->withErrors("Erro ao cadastrar Funcionário! {$e->getMessage()}");
			}
		}

		public function edit($id)
		{
			$employee = Employee::findOrFail(intval($id));
			return view('employees.edit', compact('employee'));
		}

		public function update(Request $request, $id)
		{
			$request->validate([
				'nome'  => 'required', 'dataNascimento' => 'required', 'cpf' => 'required|digits:11|numeric',
				'cargo' => 'required', 'email' => 'required|email', 'status' => 'required',
			]);

			try {
				$employee = Employee::findOrFail(intval($id));
				$employee->name = $request->nome;
				$employee->dt_birth = $request->dataNascimento;
				$employee->cpf = $request->cpf;
				$employee->office = $request->cargo;
				$employee->email = $request->email;
				$employee->status = $request->status;
				$employee->save();
				return redirect()->back()->with('success', 'Dados atualizados com Sucesso');
			} catch (\Exception $exception) {
				return redirect()->back()->withErrors($exception->getMessage());
			}
		}

		/**
		 * Método para deletar um funcionário (Usuário do sistema)
		 * @param  Request  $request
		 * @return \Illuminate\Http\RedirectResponse
		 */
		public function destroy(Request $request)
		{
			/** @var Employee|null $employee */
			$employee = null;
			try {
				$employee = Employee::findOrFail(intval($request->get('idEmployee')));
			} catch (Exception $exception) {
				return redirect()->back()->withErrors('Não foi possível localizar o funcionário no sistema');
			}

			//Verifica se o usuário não esta tentando se excluir
			if (Auth::user()->id == $employee->id) {
				return redirect()->back()->withErrors('Você não pode excluir a si mesmo!');
			}

			try {
				$employee->delete();
				return redirect()->back();
			} catch (\Exception $e) {
				return redirect()->back()->withErrors('Erro ao excluir Funcionário!');
			}
		}
	}
