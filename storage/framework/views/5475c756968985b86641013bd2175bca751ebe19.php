<?php $__env->startSection('title'); ?>
Create Security Group | Roche 
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page-title'); ?>
Create Security Group
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo Form::model($sgroup, [
    'method' => 'PATCH',
    'route' => ['securitygroup.update', $sgroup->Id],
    'files' => 'true'
    ]); ?>


    <div class="panel panel-primary">       
        <div class="panel-body">
            <div class="form-horizontal">

                <div class="form-group">   
                    <label class="col-sm-2 control-label">Display Name: </label>
                    <div class="col-sm-3">
                        <input class="form-control" name="displayname" type="text" maxlength="160" value="<?php echo e($sgroup->DisplayName); ?>" required />
                    </div>  
                </div>          

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary" value="Save"> 
                        <a href="<?php echo e(route('securitygroup.show',$sgroup->SiteId)); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </div> <!-- end of form-horizontal -->
        </div> <!-- panel body -->
    </div> <!-- panel-primary -->

    <?php echo Form::close(); ?>


    <?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>