<?php $__env->startSection('title'); ?>
    Edit Theme Image | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   Editing Image: <b><?php echo e($field); ?></b> for <b><?php echo e(Session::get('SiteCode')); ?></b>'s Theme 
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
                <input type="hidden" name="field_name" value="<?php echo e($fieldName); ?>">
                <input type="hidden" name="field" value="<?php echo e($field); ?>">
                <input type="hidden" name="edit_type" value="image">

                <div class="form-group">
                    <label class="col-sm-2 control-label">File: </label>
                    <div class="col-sm-10">
                        <input class="imgInput" type="file" name="images" required>
                        <img class="inputPreview" src="#" alt="your image">
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

        //------------------ IMAGE PREVIEW -------------//
        function readURL() {
            var $input = $(this);      

            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

            if (extn == "png" || extn == "jpg" || extn == "jpeg") 
            {
                if (typeof (FileReader) != "undefined") 
                {            
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $input.next('.inputPreview').attr('src', e.target.result).show();
                            $(".imgPreview").hide();
                        }
                        reader.readAsDataURL(this.files[0]);                
                    }
                } 
                else 
                {
                    alert("This browser does not support FileReader.");
                }
            } 
            else
            {
                $input.next('.inputPreview').hide();
                $(this)[0].value = '';

                alert("Please select images only.");
            }
        }

        $(".imgInput").change(readURL);
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>