<?php $__env->startSection('title'); ?>
    <?php echo e(Session::get('SiteCode')); ?>'s Pinned Articles | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   <b><?php echo e(Session::get('SiteCode')); ?></b>'s Menu Footer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="show-return">
        <a href="<?php echo e(route('site.show', Session::get('SiteCode'))); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
    </div>

    <div class="form-horizontal">
        <div class="pg-categories-blue">
            PINNED ARTICLES
            <div class="pull-right">
                <a href="<?php echo e(route('pinnedarticle.edit',Session::get('SiteId'))); ?>" class="theme-btn"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            </div>
        </div>

        <?php if($pinned_articles->isNotEmpty()): ?>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="show-content">
                    <?php $__currentLoopData = $pinned_articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-row">   
                            <?php echo e($pa->Title); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="none-available"> NO ARTICLES TO DISPLAY </div>
        <?php endif; ?>
    </div> <!-- form horizontal-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>