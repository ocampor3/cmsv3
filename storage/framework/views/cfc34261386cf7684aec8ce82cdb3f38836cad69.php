<?php $__env->startSection('title'); ?>
    <?php echo e(Session::get('SiteCode')); ?>'s Articles | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   <b><?php echo e(Session::get('SiteCode')); ?></b>'s Article List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php if(Auth::user()->UserGroup != 'Visitor'): ?>
		<div class="top-btn">
			<a href="<?php echo e(route('article.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW ARTICLE </b></a>
		</div>
	<?php endif; ?>

	<!-- save to session the current page so we can redirect back to this page-->
	<?php echo e(Session::put('return_page',Request::url().'?page='.$article->currentPage())); ?>

	
	<div class="dataTables_wrapper form-inline dt-bootstrap">
		<div class="row">
			<div class="col-sm-12">
				<div class="dataTables_length">
					<label style="font-weight:400 !important;margin-right: 100px;">
						Show
				        
				   		<?php echo Form::select('pageshow', ['25' => '25','50' => '50','100' => '100','250' => '250','500' => '500'],$paginate, ['id' =>'showpage' ,'class' => 'form-control input-sm', 'style' => 'width: 60px;' ,'placeholder' => '--Select Type--']); ?> 
				       	
				       	entries
			    	</label>

			    	<label style="font-weight:400 !important;margin-right: 100px;">
						Filter by Category : 

				        <?php if($filter_category != null): ?>
				   			<?php echo Form::select('category',$category,$filter_category, ['id' =>'showcategory' ,'class' => 'form-control input-sm','style' => 'width: 150px;' ,'placeholder' => '--Select Category--']); ?>

				   		<?php else: ?>
				   			<?php echo Form::select('category',$category,null, ['id' =>'showcategory' ,'class' => 'form-control input-sm','style' => 'width: 150px;' ,'placeholder' => '--Select Category--']); ?>

				   		<?php endif; ?> 
				       	
			    	</label>

			    	<label style="font-weight:400 !important;">
						Filter by User : 

				        <?php if($filter_user != null): ?>
				   			<?php echo Form::select('user',$users,$filter_user, ['id' =>'showuser' ,'class' => 'form-control input-sm','style' => 'width: 150px;' ,'placeholder' => '--Select User--']); ?>

				   		<?php else: ?>
				   			<?php echo Form::select('user',$users,null, ['id' =>'showuser' ,'class' => 'form-control input-sm','style' => 'width: 150px;' ,'placeholder' => '--Select User--']); ?>

				   		<?php endif; ?> 
				       	
			    	</label>
			    </div>
			</div>
		</div>
	</div>

	<table class="theme">
		<tbody>
			<tr>
				<th>Article Title</th>
				<th>File Type</th>				
				<th style="width: 20%;">Category</th>				
				<th>Status</th>
				<th>Value</th>
				<th>Modified Date</th>
				<th>Action</th>
			</tr>	

			<?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
				 	<td><?php echo e($art->Title); ?></td>
				 	<td><?php echo e($art->Type); ?></td>				 				
					<td><?php echo e(substr($art['category'][0]->Name,0,30)); ?></td>	
				 	<td><?php echo e($art->Status); ?></td>				
					
					<?php if($art->Type == 'DIRECTTEXT' || $art->Type == 'DIRECTTEXTFULL'): ?>
						<td><?php echo $art->Value; ?></td>

					<?php elseif($art->Type == 'LINKPassword'): ?>
						<td><?php echo $art->EncryptedLinkValue; ?></td>

					<?php elseif($art->Type == 'LinkedArticle'): ?>
						<td><a href="<?php echo e(route('showArticle', $art->ArticleId)); ?>"><?php echo $art->LinkedArticle->Title; ?></a></td>
					
					<?php elseif($art->Type == 'LINK' || $art->Type == 'LINKExternal' || $art->Type == 'LINKLogin' || $art->Type == 'LINKInheritLogin' || $art->Type == 'LINKAutofill' || $art->Type == 'LINKCredential'): ?>
				 		<td><a href="<?php echo e($art->Value); ?>" target="_blank"><?php echo e($art->Value); ?></a></td>

				 	<?php elseif($art->Type == 'File' || $art->Type == 'Text'): ?>
				 		<td><a href="<?php echo e($art->Value); ?>" download="$art->FileName" target="_blank"><?php echo e($art->FileName); ?></a></td>

				 	<?php else: ?>
				 		<td></td>
					<?php endif; ?>

				 	<td>
				 		<?php if($art->ModifiedDate == null): ?>
				 			<?php echo e($art->CreatedDate); ?>

				 		<?php else: ?>
				 			<?php echo e($art->ModifiedDate); ?>

				 		<?php endif; ?>
				 	</td>
				  	<td>
					  	<a href="<?php echo e(route('showArticle', $art->Id)); ?>" class="btn btn-primary" role="button"><span class="fa fa-eye"></span></a>	
			        </td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

	<?php if($article->items() == []): ?>           
        <div class="none-available"> NO ARTICLES TO DISPLAY </div>            
    <?php endif; ?>
	
	<div class="dataTables_paginate paging_simple_numbers" style="text-align: center;">   
		<?php echo e($article->links('vendor.pagination.bootstrap-4')); ?> 
    </div> 

    <script type="text/javascript">

    	//if dropdown value of show page changed
    	$('#showpage').change(function(){
    		var paginate = $(this).val();

			$.cookie("article_pageshow",paginate);
		    
		    location.reload();
		});

		//if dropdown value of category filter changed
    	$('#showcategory').change(function(){
    		var cat = $(this).val();

			$.cookie("article_categoryfilter",cat);
		    
		    location.reload();
		});

		//if dropdown value of user filter changed
    	$('#showuser').change(function(){
    		var user = $(this).val();

			$.cookie("article_userfilter",user);
		    
		    location.reload();
		});

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>