<?php $__env->startSection('title'); ?>
    <?php echo e($site->Title); ?>'s Subsite | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <div class="top-btn">
        <a href="<?php echo e(route('site.index')); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
    </div>

    <b><?php echo e($site->Title); ?></b>'s Subsites:

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<?php if(Auth::user()->UserGroup != "User"): ?>
		<div class="top-btn">
			<!-- create new site -->
			<a href="<?php echo e(route('subsite.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW SUBSITE </b></a>
		</div>
	<?php endif; ?>
        
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
			 	<th>Site Code</th>
			  	<th>Title</th>
			  	<th>View Type</th>
			  	<th>SubView Type</th>
			  	<th>Action</th>
			</tr>

            <?php $__currentLoopData = $subsites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr>

			  		<td><?php echo e($subsite['SiteCode']); ?></td>
				  	<td><?php echo e($subsite->Title); ?></td>
				  	<td><?php echo e($subsite->ViewType); ?></td>
				  	<td><?php echo e($subsite->SubviewType); ?></td>
				  	<td>			  		
				  		<!-- view subsite details -->
			  			<a href="<?php echo e(route('site.show', $subsite->SiteCode)); ?>" class="btn btn-success" title="Show more details" role="button">
			  				<span class="fa fa-cogs"></span>
			  			</a>

			  			<!-- edit subsite details -->
			  			<a href="<?php echo e(route('site.edit', $subsite->SiteCode)); ?>" class="btn btn-warning" title="Edit subsite details" role="button">
			  				<span class="fa fa-edit"></span>
			  			</a>

			  			<?php if(Auth::user()->UserGroup != "User"): ?>
				  			<!-- delete subsite -->
							<?php echo Form::open([
	                            'method' => 'DELETE',
	                            'route' => ['site.destroy', $subsite->Id],
	                            'style' => 'display:inline-block;',
	                        ]); ?>


	                        <?php echo Form::button('<span class="fa fa-trash">   </span>', 
	                                array(  'id' => 'btnDel', 
	                                        'class' => 'btn btn-danger',
	                                        'title' => 'Delete subsite?',
	                                        'data-toggle' => 'modal',
	                                        'data-target' => '#confirmDelete',
	                                        'data-title' => 'Delete Site: '.$subsite->SiteCode,
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

    <?php if($subsites->items() == []): ?>           
        <div class="none-available"> NO SUBSITES TO DISPLAY </div>            
    <?php endif; ?>

    <?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

    <script type="text/javascript">

        //if dropdown value of pagination
        $('#showpage').change(function(){
            var paginate = $(this).val();

            $.cookie("subsite_pageshow",paginate);
            
            location.reload();
        });

    </script>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>