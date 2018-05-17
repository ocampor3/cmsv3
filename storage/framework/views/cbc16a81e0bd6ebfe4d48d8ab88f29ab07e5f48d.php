<?php $__env->startSection('title'); ?>
    <?php echo e(Session::get('SiteCode')); ?>'s Category | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <b><?php echo e(Session::get('SiteCode')); ?></b>'s CATEGORY MANAGEMENT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
        <div class="top-btn">
            <a href="<?php echo e(route('category.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW CATEGORY </b></a>
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

            <!-- column titles -->
            <tr>
                <th class="div-center">Icon</th>
                <th class="div-center">Category Name</th>
                <th class="div-center">Status</th>
                <th class="div-center">Allow Upload</th>
                <th class="div-center">Show Menu Footer</th>
                <th class="div-center">Allow Share</th>
                <th class="div-center">Show Top Banner</th>
                <th class="div-center">Sort Order</th>
                <th class="div-center">View Color</th>
                <th class="div-center">Action</th>
            </tr>   

            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="div-center">
                        <div class="theme-icon">
                            <img src="<?php echo e($cat->Icon); ?>">
                        </div>  
                    </td>

                    <td><?php echo e($cat->Name); ?></td>

                    <td class="div-center"><?php echo e($cat->Status); ?></td>

                    <td class="div-center">
                        <?php if($cat->AllowUpload == 1): ?>
                             <span class="fa fa-check"></span>
                        <?php else: ?>
                            <span class="fa fa-close"></span>
                        <?php endif; ?>
                    </td>

                    <td class="div-center">
                        <?php if($cat->MenuFooter == 1): ?>
                             <span class="fa fa-check"></span>
                        <?php else: ?>
                            <span class="fa fa-close"></span>
                        <?php endif; ?>
                    </td>

                    <td class="div-center">
                        <?php if($cat->AllowShare == 1): ?>
                             <span class="fa fa-check"></span>
                        <?php else: ?>
                            <span class="fa fa-close"></span>
                        <?php endif; ?>
                    </td>
                    
                    <td class="div-center">
                        <?php if($cat->TopBannerShow == 1): ?>
                             <span class="fa fa-check"></span>
                        <?php else: ?>
                            <span class="fa fa-close"></span>
                        <?php endif; ?>
                    </td>

                    <td class="div-center"><?php echo e($cat->SortOrder); ?></td>

                    <td class="div-center">
                        <?php if($cat->ViewColor == null): ?>
                            NO COLOR
                        <?php else: ?>
                            <div class="theme-displaycolor" style="background-color:<?php echo e($cat->ViewColor); ?>;"></div> 
                        <?php endif; ?>
                    </td>

                    <td class="div-center">
                        <a href="<?php echo e(route('subcategory.show', $cat->Id)); ?>" class="btn btn-primary" title="View Subcategories" role="button"><span class="fa fa-eye"></span></a>  
                        
                        <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
                            <a href="<?php echo e(route('category.edit', $cat->Id)); ?>" class="btn btn-warning" title="Edit Category Details" role="button"><span class="fa fa-edit"></span></a>

                            <?php echo Form::open([
                                'method' => 'DELETE',
                                'route' => ['category.destroy', $cat->Id],
                                'style' => 'display:inline-block;',
                            ]); ?>


                            <?php echo Form::button('<span class="fa fa-trash">   </span>', 
                                    array(  'id' => 'btnDel', 
                                            'class' => 'btn btn-danger',
                                            'title' => 'Delete Category?',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#confirmDelete',
                                            'data-title' => 'Delete Category: '.$cat->Name,
                                            'data-message' => 'Category, its subcategories, and articles associated with it will be permanently deleted. Are you sure you want to delete this Category?',
                                            'data-btncancel' => 'btn-default',
                                            'data-btnaction' => 'btn-danger',
                                            'data-btntxt' => 'Confirm'
                            )); ?>


                            <?php echo Form::close(); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- foreach category -->
        </tbody>
    </table> <!-- table theme -->

    <?php if($category->items() == []): ?>           
        <div class="none-available"> NO CATEGORIES TO DISPLAY </div>            
    <?php endif; ?>

    <div class="dataTables_paginate paging_simple_numbers" style="text-align: center;">   
        <?php echo e($category->links('vendor.pagination.bootstrap-4')); ?> 
    </div>

    <?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">

        //if dropdown value of pagination
        $('#showpage').change(function(){
            var paginate = $(this).val();

            $.cookie("category_pageshow",paginate);
            
            location.reload();
        });

    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>