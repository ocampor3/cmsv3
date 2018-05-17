<?php $__env->startSection('title'); ?>	 
    User Management | Roche
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
	<?php if(Auth::user()->UserGroup == 'Admin'): ?>
		USER MANAGEMENT
	<?php else: ?>
		<b><?php echo e(Session::get('SiteCode')); ?></b>'s User Management
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="top-btn">
		<a href="<?php echo e(route('user.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW USER </b></a>
	</div>

	<?php if(!empty($inactiveusers)): ?>

	    <section class="content-header" style="padding-left: 0px;">
	        <h1 style="word-wrap: break-word;">Inactive Users</h1>
	    </section>

		<table class="theme">
			<tbody>
				<tr>
					<th>Username</th>
					<th>Name</th>
					<th>Action</th>
				</tr>

				<?php $__currentLoopData = $inactiveusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iuser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($iuser->UserName); ?></td>
					<td><?php echo e($iuser->FullName); ?></td>
					<td>
			  			<!-- edit user details -->
			  			<a href="<?php echo e(route('user.edit', $iuser->Id)); ?>" class="btn btn-warning" title="Edit user details" role="button">
			  				<span class="fa fa-edit"></span>
			  			</a>

			  			<!-- delete inactive user -->
						<?php echo Form::open([
		                    'method' => 'DELETE',
		                    'route' => ['user.destroy', $iuser->Id],
		                    'style' => 'display:inline-block;',
		                ]); ?>


		                <?php echo Form::button('<span class="fa fa-trash"> </span>', 
		                        array(  'id' => 'btnDel', 
		                                'class' => 'btn btn-danger',
		                                'title' => 'Delete Inactive User?',
		                                'data-toggle' => 'modal',
		                                'data-target' => '#confirmDelete',
		                                'data-title' => 'Delete Inactive User: '.$iuser->UserName,
		                                'data-message' => 'User will be permanently deleted. Are you sure you want to delete this Inactive User?',
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

	    <hr style="border-top: 1px solid #000;">
	<?php endif; ?>

    <section class="content-header" style="padding-left: 0px;">
        <h1 style="word-wrap: break-word;">Active Users</h1>
    </section>
    <br>

	<div class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_length">
                    <label style="font-weight:400 !important;">
                        Show
                        
                        <?php echo Form::select('pageshow', ['25' => '25','50' => '50','100' => '100','250' => '250','500' => '500'], 
                                         $paginate, ['id' =>'showpage' ,'class' => 'form-control input-sm', '
                                         style' => 'width: 60px;' ,'placeholder' => '--Select Type--']); ?> 
                        
                        entries
                    </label>
                </div>
            </div>
        </div>
    </div>

	<table class="theme">
		<tbody>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>User Group</th>
				<th>Site Handled</th>
				<th>Action</th>
			</tr>	

			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($user->UserName); ?></td>
					<td><?php echo e($user->FullName); ?></td>
					<td><?php echo e($user->UserGroup); ?></td>
					<!-- <td><?php echo e($user['sc']['Title']); ?></td>		 -->
					<td>
						<?php $__currentLoopData = $user['usersite']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($s['sites'][0]->Title); ?>

							<br>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</td>		
					<td>
			  			<!-- edit user details -->
			  			<a href="<?php echo e(route('user.edit', $user->Id)); ?>" class="btn btn-warning" title="Edit user details" role="button">
			  				<span class="fa fa-edit"></span>
			  			</a>

			  			<!-- delete user -->
						<?php echo Form::open([
	                        'method' => 'DELETE',
	                        'route' => ['user.destroy', $user->Id],
	                        'style' => 'display:inline-block;',
	                    ]); ?>


	                    <?php echo Form::button('<span class="fa fa-trash"> </span>', 
	                            array(  'id' => 'btnDel', 
	                                    'class' => 'btn btn-danger',
	                                    'title' => 'Delete User?',
	                                    'data-toggle' => 'modal',
	                                    'data-target' => '#confirmDelete',
	                                    'data-title' => 'Delete User: '.$user->UserName,
	                                    'data-message' => 'User will be permanently deleted. Are you sure you want to delete this User?',
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

	<div class="dataTables_paginate paging_simple_numbers" style="text-align: center;">   
		<?php echo e($users->links('vendor.pagination.bootstrap-4')); ?> 
    </div>

	<?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

	<script type="text/javascript">

        //if dropdown value of pagination
        $('#showpage').change(function(){
            var paginate = $(this).val();

            $.cookie("user_pageshow",paginate);
            
            location.reload();
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>