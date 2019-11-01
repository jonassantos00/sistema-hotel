<?php $__env->startSection('adminlte_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body_class', 'login-page'); ?>

<?php $__env->startSection('body'); ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo e(url(config('adminlte.dashboard_url', 'dashboard'))); ?>"><?php echo config('adminlte.logo', '<b>Admin</b>LTE'); ?></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"><?php echo e(__('adminlte::adminlte.login_message')); ?></p>
            <form action="<?php echo e(url(config('adminlte.login_url', 'login'))); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="form-group has-feedback <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>"
                           placeholder="<?php echo e(__('adminlte::adminlte.email')); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group has-feedback <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                    <input type="password" name="password" class="form-control"
                           placeholder="<?php echo e(__('adminlte::adminlte.password')); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember"><?php echo e(__('adminlte::adminlte.remember_me')); ?></label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <?php echo e(__('adminlte::adminlte.sign_in')); ?>

                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            
            
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/www/sistema-hotel.lc/resources/views/vendor/adminlte/login.blade.php ENDPATH**/ ?>