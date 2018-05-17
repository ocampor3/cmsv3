<?php $__env->startSection('title'); ?>
    Site Management | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
	SITE MANAGEMENT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<?php if(Auth::user()->UserGroup != "User"): ?>
		<div class="top-btn">
			<!-- create new site -->
			<a href="<?php echo e(route('site.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> NEW SITE </b></a>
		</div>
	<?php endif; ?>

	<table class="theme">
		<tbody>
			<tr>
				<th>Icon</th>
			 	<th>Site Code</th>
			  	<th>Title</th>
			  	<th>Status</th>
			  	<th>View Type</th>
			  	<th>SubView Type</th>
			  	<th>Parent Site</th>
			  	<th>Subsites</th>
			  	<th>Action</th>
			</tr>

			<?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>

                    <td class="div-center">
                        <div class="theme-icon">
                            <img src="<?php echo e($site->Icon); ?>">
                        </div>  
                    </td>
			  		<td><?php echo e($site['SiteCode']); ?></td>
				  	<td><?php echo e($site->Title); ?></td>
				  	<td><?php echo e($site->Status); ?></td>
				  	<td><?php echo e($site['theme']->ViewType); ?></td>
				  	<td><?php echo e($site['theme']->SubViewType); ?></td>
				  	<td><?php echo e($site->parentSite['SiteCode']); ?></td>
				  	<td>
				  		<?php if($site->parentSite == null): ?>
					  		<!-- view subsites -->
				  			<a href="<?php echo e(route('subsites.index', $site->Id)); ?>" class="btn btn-primary" title="View Subsites" role="button">
				  				<span class="fa fa-eye"></span>
				  			</a>
			  			<?php endif; ?>
				  	</td>
				  	<td>			  		
				  		<!-- view site details -->
			  			<a href="<?php echo e(route('site.show', $site->SiteCode)); ?>" class="btn btn-success" title="Show more details" role="button">
			  				<span class="fa fa-cogs"></span>
			  			</a>

			  			<!-- edit site details -->
			  			<a href="<?php echo e(route('site.edit', $site->SiteCode)); ?>" class="btn btn-warning" title="Edit site details" role="button">
			  				<span class="fa fa-edit"></span>
			  			</a>

			  			<?php if(Auth::user()->UserGroup != "User"): ?>
				  			<!-- delete site -->
							<?php echo Form::open([
	                            'method' => 'DELETE',
	                            'route' => ['site.destroy', $site->Id],
	                            'style' => 'display:inline-block;',
	                        ]); ?>


	                        <?php echo Form::button('<span class="fa fa-trash">   </span>', 
	                                array(  'id' => 'btnDel', 
	                                        'class' => 'btn btn-danger',
	                                        'title' => 'Delete site?',
	                                        'data-toggle' => 'modal',
	                                        'data-target' => '#confirmDelete',
	                                        'data-title' => 'Delete Site: '.$site->SiteCode,
	                                        'data-message' => 'Site and all data associated with this will be permanently deleted. Are you sure you want to delete this Site?',
	                                        'data-btncancel' => 'btn-default',
	                                        'data-btnaction' => 'btn-danger',
	                                        'data-btntxt' => 'Confirm'
	                        )); ?>


	                        <?php echo Form::close(); ?> 
	                    <?php endif; ?>
	  			  	</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		</tbody>
	</table>

	<?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>