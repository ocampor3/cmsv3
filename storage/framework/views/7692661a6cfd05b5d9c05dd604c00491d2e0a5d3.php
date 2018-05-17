<?php $__env->startSection('title'); ?>
    <?php echo e($site->Title); ?>'s Settings | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   <b><?php echo e($site->Title); ?></b>'s Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <?php if(Auth::user()->UserGroup == 'Owner' || Auth::user()->UserGroup == 'Admin'): ?>
        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Theme</h3>
                </div>
                
                <a href="<?php echo e(route('theme.show',Session::get('SiteId'))); ?>" class="small-box-footer">
                    Show More Details <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>Categories</h3>
            </div>
            
            <a href="<?php echo e(route('category.show',Session::get('SiteId'))); ?>" class="small-box-footer">
                Show More Details <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>Articles</h3>
            </div>
            
            <a href="<?php echo e(route('article.show',Session::get('SiteId'))); ?>" class="small-box-footer">
                Show More Details <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <?php if(Auth::user()->UserGroup == 'Owner' || Auth::user()->UserGroup == 'Admin'): ?>
        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Menu Footer</h3>
                </div>
                
                <a href="<?php echo e(route('pinnedarticle.show',Session::get('SiteId'))); ?>" class="small-box-footer">
                    Show More Details <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Security Group</h3>
                </div>

                <a href="<?php echo e(route('securitygroup.show',Session::get('SiteId'))); ?>" class="small-box-footer">
                    Show More Details <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>