<?php $__env->startSection('title'); ?>
    Roche | Home
<?php $__env->stopSection(); ?>


<?php $__env->startSection('meta-url'); ?>
	<?php echo e(Request::url()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-title'); ?>
	Home
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>