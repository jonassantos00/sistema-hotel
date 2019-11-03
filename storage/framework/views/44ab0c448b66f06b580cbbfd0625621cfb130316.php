<?php $__env->startSection('title', 'Funcionários'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">

    <div class="col-md-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de Funcionários</h3>
                </div>
                <form action="<?php echo e(Route('funcionarios.cadastrar')); ?>" method="POST" >
                  <?php echo e(csrf_field()); ?>

                  <div class="box-body">
                    <div class="form-group col-md-4">
                      <label for="inputNome">Nome Completo</label>
                      <input type="text" class="form-control" name="nome" value="<?php echo e(old('nome')); ?>" id="inputNome" required >
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputDataNascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="dataNascimento" value="<?php echo e(old('dataNascimento')); ?>" id="inputDataNascimento" required >
                    </div>
                    <div class="form-group col-md-3">
                            <label for="inputCpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" value="<?php echo e(old('cpf')); ?>" maxlength="11" id="inputCpf" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Cargo</label>
                        <select name="cargo" class="form-control" required >
                          <option value="" > Selecione uma opção</option>
                          <option value="Gerente" > Gerente </option>
                          <option value="Funcionário" > Funcionário </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" >
                      <label for="inpuntEmail">E-mail</label>
                      <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="inputEmail" required >
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label for="inputPassword">Senha</label>
                      <input type="password" name="senha" class="form-control" id="inputPassword" required >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword2">Confirmar Senha</label>
                        <input type="password" name="confirmarSenha" class="form-control" id="inputPassword2" required >
                      </div>
                 
                  <div class="form-group col-md-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required >
                      <option value=""> Selecione uma opção</option>
                      <option value="Ativo"> Ativo</option>
                      <option value="Desligado"> Desligado</option>
                      <option value="Afastado"> Afastado</option>

                    </select>
                  </div>
                  </div>    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  </div>
                </form>
              </div>
    </div>
    <div class="col-md-12">
        <div class="box box-primary table-responsive">
          <div class="box-header with-border">
            <h3 class="box-title">Listagem de Funcionários</h3>
          </div>
          <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">Matrícula</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Status</th>
                  <th style="width: 100px; min-width:100px;">Opções</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $funcionarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funcionario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="text-align:center;" ><?php echo e($funcionario->id); ?></td>
                    <td><?php echo e($funcionario->nome); ?></td>
                    <td><?php echo e($funcionario->email); ?></td>
                    <td><?php echo e($funcionario->status); ?></td>
                    <td>
                      <a href="<?php echo e(Route('funcionarios.editar', $funcionario->id)); ?>" class="btn btn-info btn-xs"><i class="fa fa-edit" ></i></a>
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal" data-nome="<?php echo e($funcionario->nome); ?>" data-identificador="<?php echo e($funcionario->id); ?>" data-acao="Deseja excluir o Funcionário " ><i class="fa fa-trash" ></i></button>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>

      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php echo e(Route('funcionarios.excluir')); ?>" method="POST" >
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="idFuncionario" class="identificador" >
                <div class="form-group">
                  <h5 class="nome"></h5>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-danger">Sim</button>
            </div>
          </form>
          </div>
        </div>
      </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/www/sistema-hotel.lc/resources/views/funcionarios/index.blade.php ENDPATH**/ ?>