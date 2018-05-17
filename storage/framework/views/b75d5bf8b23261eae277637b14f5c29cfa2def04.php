<?php $__env->startSection('title'); ?>
    Edit Theme Texts | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   Editing Texts for <b><?php echo e(Session::get('SiteCode')); ?></b>'s Theme 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::model($theme, [
        'method' => 'PATCH',
        'route' => ['theme.update', $theme->Id],
        'files' => 'true',
    ]); ?>


    <div class="panel panel-primary">       
        <div class="panel-body">
            <div class="form-horizontal">
                <input type="hidden" name="edit_type" value="text">

                <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Title: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="<?php echo e($theme->Title); ?>" maxlength="160" required>
                    
                        <?php if($errors->has('title')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Button Color: </label>
                    <div class="col-sm-2">
                        <input type="color" class="form-control" name="btnColor" value="<?php echo e($theme->ButtonColor); ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Separator Color: </label>
                    <div class="col-sm-2">
                        <input type="color" class="form-control" name="separatorColor" value="<?php echo e($theme->SeparatorColor); ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Text Color: </label>
                    <div class="col-sm-2">
                        <input type="color" class="form-control" name="textColor" value="<?php echo e($theme->TextColor); ?>" required>
                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('aboutTitle') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">About Title: </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="aboutTitle" type="text" value="<?php echo e($theme->AboutTitle); ?>" maxlength="160" required/>
                    
                        <?php if($errors->has('aboutTitle')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('aboutTitle')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>               

                <div class="form-group">
                    <label class="col-sm-2 control-label">About Content: </label>
                    <div class="col-sm-10">
                        <textarea id="wysiwyg" name="about_content" class="form-control" row="10" style="font-size: 14px; line-height: 18px; 
                                    border: 1px solid rgb(221, 221, 221); padding: 10px; resize: none;" placeholder="Enter text..."
                                    required><?php echo e($theme->AboutContent); ?></textarea>
                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('contactTitle') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Contact Title: </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="contactTitle" type="text" value="<?php echo e($theme->ContactTitle); ?>" maxlength="160" required/>
                    
                        <?php if($errors->has('contactTitle')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('contactTitle')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>   

                <div class="form-group">
                    <label class="col-sm-2 control-label">Contact Content: </label>
                    <div class="col-sm-10">
                        <textarea id="wysiwyg" name="contact_content" class="form-control" row="10" style="font-size: 14px; line-height: 18px; 
                                    border: 1px solid rgb(221, 221, 221); padding: 10px; resize: none;" placeholder="Enter text..."
                                    required><?php echo e($theme->ContactContent); ?></textarea>
                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('factsTitle') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Facts Title: </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="factsTitle" type="text" value="<?php echo e($theme->FactsTitle); ?>" maxlength="160" required/>
                    
                        <?php if($errors->has('factsTitle')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('factsTitle')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Facts Content: </label>
                    <div class="col-sm-10">
                        <textarea id="wysiwyg" name="facts_content" class="form-control" row="10" style="font-size: 14px; line-height: 18px; 
                                    border: 1px solid rgb(221, 221, 221); padding: 10px; resize: none;" placeholder="Enter text..."
                                    required><?php echo e($theme->FactsContent); ?></textarea>
                    </div>
                </div>

                <div class="form-group">   
                    <label for="title" class="col-sm-2 control-label">View Type:</label>    
                    <div class="col-sm-4">                              
                        <?php echo Form::select('viewtype',['None' => 'None', 'GridView' => 'Grid View', 'ListView' => 'List View', 'WindowsView' => 'Windows View'], $theme->ViewType, 
                            ['id' => 'col-half-width', 'class' => 'form-control', 
                            'placeholder' => '--Select View Type--', 'required']); ?> 
                    </div>       
                </div>

                <div class="form-group">   
                    <label for="title" class="col-sm-2 control-label">Subview Type:</label>    
                    <div class="col-sm-4">                              
                        <?php echo Form::select('subviewtype',['None' => 'None', 'GridView' => 'Grid View', 'ListView' => 'List View', 'WindowsView' => 'Windows View'], $theme->SubViewType, 
                            ['id' => 'col-half-width', 'class' => 'form-control', 
                            'placeholder' => '--Select View Type--', 'required']); ?> 
                    </div>       
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-warning" value="Update"> 
                        <a href="<?php echo e(route('theme.show',Session::get('SiteId'))); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>

            </div> <!-- end of form-horizontal -->
        </div> <!-- panel body -->
    </div> <!-- panel-primary -->

    <?php echo Form::close(); ?>


    <script type="text/javascript">

        // ------- TINY MCE, WYSIWYG TEXT EDITOR ----------- //
        tinymce.init({ selector:'textarea#wysiwyg',                    
                       theme: 'modern',
                       plugins: [
                            'advlist autolink lists link charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime nonbreaking save contextmenu directionality',
                            'template paste textcolor colorpicker textpattern'
                       ],
                       toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
                       toolbar2: 'print preview | forecolor backcolor | fontselect |  fontsizeselect',
                       image_advtab: true,
                       templates: [
                             { title: 'Test template 1', content: 'Test 1' },
                             { title: 'Test template 2', content: 'Test 2' }
                       ],
                       content_css: [
                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                            '//www.tinymce.com/css/codepen.min.css',                              
                       ],   
                       forced_root_block : 'div',
                       fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
                       file_browser_callback: function(field_name, url, type, win){
                           
                        }
                                            
                       
                     });
    </script>


<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>