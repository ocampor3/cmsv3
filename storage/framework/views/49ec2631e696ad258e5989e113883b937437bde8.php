<?php $__env->startSection('title'); ?>
    <?php echo e($category->Name); ?>'s Subcategory | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <div class="top-btn">
        <?php if($category->ParentId == 0): ?>
            <a href="<?php echo e(route('category.show', Session::get('SiteId'))); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
        <?php else: ?>
            <a href="<?php echo e(route('subcategory.show', $category->ParentId)); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
        <?php endif; ?>
    </div>

    <b><?php echo e($category->Name); ?></b>'s Subcategories:

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
        <div class="top-btn">
            <a href="<?php echo e(route('subcategory.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW SUBCATEGORY </b></a>
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
                <th class="div-center">Icon</th>
                <th class="div-center">Category Name</th>
                <th class="div-center">Status</th>
                <th class="div-center">Allow Upload</th>
                <th class="div-center">Show Menu Footer</th>
                <th class="div-center">Allow Share</th>
                <th class="div-center">Show Top Banner</th>
                <th class="div-center">Sort Order</th>
                <th class="div-center">View Color</th>

                <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
                    <th class="div-center">Action</th>
                <?php endif; ?>
            </tr>  

            <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <tr>                       
                    <td>
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

                    <td class="div-center">
                        <?php echo e($cat->SortOrder); ?>

                    </td>

                    <td class="div-center">
                        <?php if($cat->ViewColor == null): ?>
                            NO COLOR
                        <?php else: ?>
                            <div class="theme-displaycolor" style="background-color:<?php echo e($cat->ViewColor); ?>;"></div> 
                        <?php endif; ?>
                    </td>

                    <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
                        <td class="div-center">       
                            <!-- add subcategory-->
                            <a href="<?php echo e(route('subcategory.show', $cat->Id)); ?>" class="btn btn-primary" title="View Subcategories" role="button"><span class="fa fa-eye"></span></a>  
                            <!-- edit subcategory -->                         
                            <a href="<?php echo e(route('subcategory.edit', $cat->Id)); ?>" class="btn btn-warning" role="button"><span class="fa fa-edit"></span></a>

                            <!-- delete subcategory -->
                            <?php echo Form::open([
                                'method' => 'DELETE',
                                'route' => ['subcategory.destroy', $cat->Id],
                                'style' => 'display:inline-block;',
                            ]); ?>


                            <?php echo Form::button('<span class="fa fa-trash">   </span>', 
                                    array(  'id' => 'btnDel', 
                                            'class' => 'btn btn-danger',
                                            'title' => 'Delete subcategory?',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#confirmDelete',
                                            'data-title' => 'Delete Subcategory: '.$cat->Name,
                                            'data-message' => 'Subcategory, and articles associated with it will be permanently deleted. Are you sure you want to delete this Subcategory?',
                                            'data-btncancel' => 'btn-default',
                                            'data-btnaction' => 'btn-danger',
                                            'data-btntxt' => 'Confirm'
                            )); ?>


                            <?php echo Form::close(); ?>

                        </td>
                    <?php endif; ?>

                </tr>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tr>
        </tbody>
    </table>

    <?php if($subcat->items() == []): ?>           
        <div class="none-available"> NO SUBCATEGORIES TO DISPLAY </div>            
    <?php endif; ?>

    <div class="dataTables_paginate paging_simple_numbers" style="text-align: center;">   
        <?php echo e($subcat->links('vendor.pagination.bootstrap-4')); ?> 
    </div>

    <br>

    <hr style="border-top: 1px solid #000;">

    <!-- article list -->
    <?php echo e(Session::put('return_page',Request::url())); ?>


    <section class="content-header" style="padding-left: 0px;">
        <h1 style="word-wrap: break-word;"> <b> <?php echo e($category->Name); ?> </b>'s Article List</h1>
    </section>
    <br>
    <!-- 
    <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
        <div class="top-btn">
            <a href="<?php echo e(route('article.create')); ?>" class="btn btn-success" role="button"> <span class="glyphicon glyphicon-plus"></span><b> CREATE NEW ARTICLE </b></a>
        </div>
    <?php endif; ?> -->

    <table class="theme">
        <tbody>
            <tr>
                <th>Article Title</th>
                <th>File Type</th>
                <th>Value</th>
                <th>Modified Date</th>
                <th>Action</th>
            </tr>   

            <?php $__currentLoopData = $category->Article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($art->Title); ?></td>
                    <td><?php echo e($art->Type); ?></td> 
                    
                    <?php if($art->Type == 'DIRECTTEXT' || $art->Type == 'DIRECTTEXTFULL'): ?>
                        <td><?php echo $art->Value; ?></td>
                    
                    <?php elseif($art->Type == 'LINKPassword'): ?>
                        <td><?php echo $art->EncryptedLinkValue; ?></td>

                    <?php elseif($art->Type == 'LINK' || $art->Type == 'LINKEXTERNAL' || $art->Type == 'LINKLogin' || 
                            $art->Type == 'LINKAutofill' || $art->Type == 'LINKCredential'): ?>
                        <td><a href="<?php echo e($art->Value); ?>" target="_blank"><?php echo e($art->Value); ?></a></td>

                    <?php elseif($art->Type == 'File' || $art->Type == 'TEXT'): ?>
                        <td><a href="<?php echo e($art->Value); ?>" target="_blank"><?php echo e($art->FileName); ?></a></td>

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

    <?php if(count($category->Article) <= 0): ?>           
        <div class="none-available"> NO ARTICLES TO DISPLAY </div>            
    <?php endif; ?>

    <?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

    <script type="text/javascript">

        //if dropdown value of pagination
        $('#showpage').change(function(){
            var paginate = $(this).val();

            $.cookie("subcategory_pageshow",paginate);
            
            location.reload();
        });

    </script>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>