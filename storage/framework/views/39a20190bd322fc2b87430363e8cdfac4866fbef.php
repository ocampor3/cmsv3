<?php $__env->startSection('title'); ?>
    <?php echo e($article->Title); ?>'s Details | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    Article <b><?php echo e($article->Title); ?></b>'s Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 

    <div class="show-return">
        <a href="<?php echo e(url(Session::get('return_page'))); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">

            <div class="crude-icon">
                <div class="icon-img">
                    <?php if($article->Icon): ?>
                        <img src="<?php echo e($article->Icon); ?>" alt="Icon Image"> 
                    <?php else: ?>
                        <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="NO IMAGE">
                    <?php endif; ?>
                </div>

                <div class="caption">
                    <b>
                    <?php if($article->IconName == null): ?>
                        NO ICON
                    <?php else: ?>
                        <?php echo e($article->IconName); ?>

                    <?php endif; ?>  
                    </b>  
                </div>
            </div>

            <div class="show-content">
                <div class="col-row">   
                    <div class="col-label">Category: </div> 
                    <div class="col-content">
                        <?php echo e($article['category'][0]->Name); ?>

                    </div>                          
                </div>

                <div class="col-row">
                    <div class="col-label">Status: </div>
                    <div class="col-content"><?php echo e($article->Status); ?></div>
                </div>

                <div class="col-row">
                    <div class="col-label">Show Menu Footer: </div>
                    <?php if($article->MenuFooter == 1): ?>
                        <span class="fa fa-check"></span>
                    <?php else: ?>
                        <span class="fa fa-close"></span>
                    <?php endif; ?>
                </div>

                <div class="col-row">
                    <div class="col-label">Allow Share: </div>
                    <?php if($article->AllowShare == 1): ?>
                        <span class="fa fa-check"></span>
                    <?php else: ?>
                        <span class="fa fa-close"></span>
                    <?php endif; ?>
                </div>

                <div class="col-row">
                    <div class="col-label">Show Top Banner: </div>
                    <?php if($article->TopBannerShow == 1): ?>
                        <span class="fa fa-check"></span>
                    <?php else: ?>
                        <span class="fa fa-close"></span>
                    <?php endif; ?>
                </div>

                <div class="col-row">
                    <div class="col-label">File Type: </div>
                    <div class="col-content"><?php echo e($article->Type); ?></div>
                </div>

                <div class="col-row">  
                    <div class="col-label">Value: </div>
                    <?php if($article->Type == 'File' || $article->Type == 'Text'): ?>
                        <div class="col-content"><a target="_blank" href="<?php echo e($article->Value); ?>" download="<?php echo e($article->FileName); ?>"><?php echo e($article->FileName); ?></a></div>
                    <?php elseif($article->Type == 'LINK' || $article->Type == 'LINKExternal' || $article->Type == 'LINKLogin' || $article->Type == 'LINKInheritLogin' || $article->Type == 'LINKAutofill' || $article->Type == 'LINKCredential'): ?>
                        <div class="col-content"><a target="_blank" href="<?php echo e($article->Value); ?>"><?php echo e($article->Value); ?></a></div>
                    <?php elseif($article->Type == 'LinkedArticle'): ?>
                        <div class="col-content"><a href="<?php echo e(route('showArticle', $article->ArticleId)); ?>"><?php echo $article->LinkedArticle->Title; ?></a></div>
                    <?php elseif($article->Type == 'LINKPassword'): ?>
                        <div class="col-content"><?php echo $article->EncryptedLinkValue; ?></div>
                    <?php elseif($article->Type == 'CalendarEvent'): ?>
                        <div class="col-content"><?php echo $article->CalendarValue->Description; ?></div>
                    <?php else: ?>
                        <div class="col-content"><?php echo $article->Value; ?></div>
                    <?php endif; ?>    
                </div>

                <?php if($article->Type == 'TEXT' || $article->Type == 'FILE'): ?>
                    <div class="col-row">
                        <div class="col-label">File Name: </div>
                        <div class="col-content"><?php echo e($article->FileName); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($article->Type == 'GeoLocation'): ?>
                    <div class="col-row">
                        <div class="col-label">Assigned User: </div>
                        <div class="col-content"><?php echo e($article->geoLocAssignedUser->FullName); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($article->Type == 'CalendarEvent'): ?>
                    <div class="col-row">
                        <div class="col-label">Date Start: </div>
                        <div class="col-content"><?php echo e($article->CalendarValue->DateStart.' '.$article->CalendarValue->TimezoneStart); ?></div>
                    </div>
                    <div class="col-row">
                        <div class="col-label">Date End: </div>
                        <div class="col-content"><?php echo e($article->CalendarValue->DateEnd.' '.$article->CalendarValue->TimezoneEnd); ?></div>
                    </div>
                <?php endif; ?>

                <?php if(Auth::user()->UserGroup != 'Visitor'): ?>
                    <div class="show-action pull-right">
                        <a href="<?php echo e(route('article.edit', $article->Id)); ?>" class="btn btn-warning"><span class="fa fa-edit"></span> Edit</a>

                        <?php echo Form::open([
                                'method' => 'DELETE',
                                'route' => ['article.destroy', $article->Id],
                                'style' => 'display:inline-block;',
                            ]); ?>


                            <?php echo Form::button('<span class="fa fa-trash">   </span>', 
                                    array(  'id' => 'btnDel', 
                                            'class' => 'btn btn-danger',
                                            'title' => 'Delete Article?',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#confirmDelete',
                                            'data-title' => 'Delete Article: '.$article->Title,
                                            'data-message' => 'Article will be permanently deleted. Are you sure you want to delete this Article?',
                                            'data-btncancel' => 'btn-default',
                                            'data-btnaction' => 'btn-danger',
                                            'data-btntxt' => 'Confirm'
                            )); ?>


                            <?php echo Form::close(); ?>

                    </div>
                <?php endif; ?>

            </div> <!-- show-content -->
        
        </div> <!-- panel body -->
    </div> <!-- panel primary -->

     <?php echo $__env->make('modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>