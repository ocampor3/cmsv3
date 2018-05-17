<?php $__env->startSection('title'); ?>	 
Security Group Management | Roche
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>

SECURITY GROUP MANAGEMENT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="top-btn">
	<a href="<?php echo e(route('securitygroup.createSGSite', $SiteId)); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW SECURITY GROUP </b></a>
</div>

<?php if(!empty($securitygroups)): ?>

<section class="content-header" style="padding-left: 0px;">
	<h1 style="word-wrap: break-word;">Security Groups</h1>
</section>

<table class="theme">
	<tbody>
		<tr>
			<th>Display Name</th>
			<th>Action</th>
		</tr>

		<?php $__currentLoopData = $securitygroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sgroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($sgroup->DisplayName); ?></td>
			<td>
				<!-- edit security group details -->
				<a href="<?php echo e(route('securitygroup.edit', $sgroup->Id)); ?>" class="btn btn-warning" title="Edit security group details" role="button">
					<span class="fa fa-edit"></span>
				</a>

				<?php echo Form::open([
                                'method' => 'DELETE',
                                'route' => ['securitygroup.delete', $SiteId,$sgroup->Id],
                                'style' => 'display:inline-block;',
                            ]); ?>


                            <?php echo Form::button('<span class="fa fa-trash">   </span>', 
                                    array(  'id' => 'btnDel', 
                                            'class' => 'btn btn-danger',
                                            'title' => 'Delete Security Group?',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#confirmDelete',
                                            'data-title' => 'Delete Security Group',
                                            'data-message' => 'Are you sure you want to delete '.$sgroup->DisplayName,
                                            'data-btncancel' => 'btn-default',
                                            'data-btnaction' => 'btn-danger',
                                            'data-btntxt' => 'Confirm'
                            )); ?>


				<?php echo Form::close(); ?>

			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>

<?php endif; ?>
 <?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>