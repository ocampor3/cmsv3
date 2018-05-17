<?php $__env->startSection('title'); ?>
    <?php echo e(Session::get('SiteCode')); ?>'s Theme | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   <b><?php echo e(Session::get('SiteCode')); ?></b>'s Theme
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="show-return">
        <a href="<?php echo e(route('site.show', Session::get('SiteCode'))); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
    </div>

    <div class="form-horizontal">
        <div class="pg-categories-blue">
            IMAGE ASSETS
        </div>

        <div class="form-group">
            <!-- site icon -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($siteDet->Icon): ?>
                            <img src="<?php echo e($siteDet->Icon); ?>" alt="site icon">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="site icon">
                        <?php endif; ?>
                    </div>

                    <div class="caption">
                        Site Icon
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('edit-site-icon',$siteDet->Id)); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>
            
            <!-- background image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_bg']->Contents): ?>
                            <img src="<?php echo e($theme['img_bg']->Contents); ?>" alt="background image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="background image">  
                        <?php endif; ?>
                    </div>

                    <div class="caption">
                        Background Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'bg_img','Background Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- banner image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_banner']): ?>
                            <img src="<?php echo e($theme['img_banner']->Contents); ?>" alt="banner image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="banner image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Banner Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'banner_img','Banner Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- arrow back -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_arrowback']): ?>
                            <img src="<?php echo e($theme['img_arrowback']->Contents); ?>" alt="arrow back image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="arrow back image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Arrow Back Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'arrow_back_img','Arrow Back Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- arrow collpase -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_arrowcollapse']): ?>
                            <img src="<?php echo e($theme['img_arrowcollapse']->Contents); ?>" alt="arrow collapse image"> 
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="arrow collapse image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Arrow Collapse Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'arrow_collapse_img','Arrow Collapse Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- arrow expand -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_arrowexpand']): ?>
                            <img src="<?php echo e($theme['img_arrowexpand']->Contents); ?>" alt="arrow expand image"> 
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="arrow expand image">  
                        <?php endif; ?>

                         
                    </div>

                    <div class="caption">
                        Arrow Expand Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'arrow_expand_img','Arrow Expand Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- arrow next -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_arrownext']): ?>
                            <img src="<?php echo e($theme['img_arrownext']->Contents); ?>" alt="arrow next image">
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="arrow next image">  
                        <?php endif; ?>

                         
                    </div>

                    <div class="caption">
                        Arrow Next Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'arrow_next_img','Arrow Next Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- hamburger image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_hamburger']): ?>
                            <img src="<?php echo e($theme['img_hamburger']->Contents); ?>" alt="hamburger icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="hamburger icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Hamburger Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'hamburger_img','Hamburger Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- Home Image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_home']): ?>
                            <img src="<?php echo e($theme['img_home']->Contents); ?>" alt="home icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="home icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Home Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'home_img','Home Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>
            
            <!-- mail image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_mail']): ?>
                            <img src="<?php echo e($theme['img_mail']->Contents); ?>" alt="mail icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="mail icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Mail Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'mail_img','Mail Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- scroll btm image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_scrollbtm']): ?>
                            <img src="<?php echo e($theme['img_scrollbtm']->Contents); ?>" alt="scroll bottom icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="scroll bottom icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Scroll Bottom Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'scroll_btm_img','Scroll Bottom Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- scroll top image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_scrolltop']): ?>
                            <img src="<?php echo e($theme['img_scrolltop']->Contents); ?>" alt="scroll top icon image">
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="scroll top icon image">  
                        <?php endif; ?>
                          
                    </div>

                    <div class="caption">
                        Scroll Top Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'scroll_top_img','Scroll Top Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- search image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_search']): ?>
                            <img src="<?php echo e($theme['img_search']->Contents); ?>" alt="search icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="search icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Search Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'search_img','Search Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- share image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_share']): ?>
                            <img src="<?php echo e($theme['img_share']->Contents); ?>" alt="share icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="share icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Share Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'share_img','Share Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- sync image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_sync']): ?>
                            <img src="<?php echo e($theme['img_sync']->Contents); ?>" alt="sync icon image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="sync icon image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Sync Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'sync_img','Sync Icon Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- logo image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_logo']): ?>
                            <img src="<?php echo e($theme['img_logo']->Contents); ?>" alt="logo image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="logo image">  
                        <?php endif; ?>
                    </div>

                    <div class="caption">
                        Logo Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'logo_img','Logo Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div>
                </div>
            </div>

            <!-- main screen box image -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="img-resize change-bg">
                        <?php if($theme['img_mainscreen']): ?>
                            <img src="<?php echo e($theme['img_mainscreen']->Contents); ?>" alt="main screen box image">  
                        <?php else: ?>
                            <img src="<?php echo e(url('/images/no_image_icon.png')); ?>" alt="main screen box image">  
                        <?php endif; ?>
                        
                    </div>

                    <div class="caption">
                        Main Screen Box Image
                    </div>

                    <div class="edit-field">
                        <a href="<?php echo e(route('editImagefield',[Session::get('ThemeId'),'main_screen_box_img','Main Screen Box Image'])); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>   
                    </div> 
                </div>
            </div>
        </div> <!-- form group -->
    </div> <!-- form horizontal-->


    <div class="form-horizontal">
        <div class="pg-categories-blue">
            TEXT ASSETS
            <div class="pull-right">
                <a href="<?php echo e(route('editContent',[Session::get('ThemeId')])); ?>" class="theme-btn"><span class="glyphicon glyphicon-edit"></span> Edit</a>
            </div>
        </div>
    </div> <!-- form horizontal -->

    <table class="theme">
        <tbody>
            <tr>
                <th class="width-quarter">Field Name</th>
                <th>Value/s</th>
                <th></th>
            </tr> 

            <tr>
                <td>Button Color</td>
                <td><?php echo e($theme->ButtonColor); ?></td>
                <td><div class="theme-val-color" style="background-color: <?php echo e($theme->ButtonColor); ?>;"></td>
            </tr> 

            <tr>
                <td>Separator Color</td>
                <td><?php echo e($theme->SeparatorColor); ?></td>
                <td><div class="theme-val-color" style="background-color:<?php echo e($theme->SeparatorColor); ?>;"></td>
            </tr>

            <tr>
                <td>Text Color</td>
                <td><?php echo e($theme->TextColor); ?></td>
                <td><div class="theme-val-color" style="background-color:<?php echo e($theme->TextColor); ?>;"></td>
            </tr>

            <tr>
                <td class="theme-field-name">About Title</td>
                <td colspan="2"><?php echo e($theme->AboutTitle); ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">About Content</td>
                <td colspan="2"><?php echo $theme->AboutContent; ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">Contact Title</td>
                <td colspan="2"><?php echo e($theme->ContactTitle); ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">Contact Content</td>
                <td colspan="2"><?php echo $theme->ContactContent; ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">Facts Title</td>
                <td colspan="2"><?php echo e($theme->FactsTitle); ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">Facts Content</td>
                <td colspan="2"><?php echo $theme->FactsContent; ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">View Type</td>
                <td colspan="2"><?php echo e($theme->ViewType); ?></td>
            </tr>

            <tr>
                <td class="theme-field-name">SubView Type</td>
                <td colspan="2"><?php echo e($theme->SubViewType); ?></td>
            </tr>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>