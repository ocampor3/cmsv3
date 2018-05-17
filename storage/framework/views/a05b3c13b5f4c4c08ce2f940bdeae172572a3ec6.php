<?php $__env->startSection('title'); ?>
    <?php echo e(Session::get('SiteCode')); ?>'s Pinned Articles | Roche 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
   <b><?php echo e(Session::get('SiteCode')); ?></b>'s Pinned Articles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="show-return">
        <a href="<?php echo e(route('site.show', Session::get('SiteCode'))); ?>" class="btn btn-primary"><span class="fa fa-arrow-left"></span> Return</a>
    </div>

    <?php echo Form::open([      
        'method' => 'POST',
        'action' => 'PinnedArticleController@store'
    ]); ?>


    <div class="form-horizontal">
        <div class="panel panel-primary">
            <div class="panel-body">
                
                <div class="form-group">
                    <div class="col-sm-10">
                        <a id="addProperty" class="btn btn-success" onClick="addProperty();"><span class="glyphicon glyphicon-plus"></span> Add Pinned Article</a>
                    </div>
                </div>

                <div class="form-group" style="display:none;">   
                    <div class="col-sm-10"> 
                        <div id="propDD">                            
                            <div class="col-sm-5">                              
                                <?php echo Form::select('pinned_article[]', $all_articles, null, ['id' => 'type-option', 'class' => 'form-control', 'placeholder' => '--Select Article--']); ?>

                            </div>                        
                            
                            <div>
                                <?php echo Form::button('<span class="glyphicon glyphicon-trash"></span>', array('id' => 'btnRemove' ,'type' => 'button', 'class' => 'btn btn-danger','onClick' => 'delDiv(this.id);')); ?>    
                            </div>
                            <br>                            
                        </div>                                               
                    </div>
                </div>

                <div class="form-group">
                    <div id="dynamicProperty" class="col-sm-10">  
                        
                        <?php $__currentLoopData = $pinned_articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="divpropDD<?php echo e($key); ?>" style="display:block;">
                                <div class="col-sm-5">
                                <?php echo Form::select('pinned_article[]', $all_articles ,$pa->Id, ['id' => 'type-option', 'class' => 'form-control', 'placeholder' => '--Select Article--']); ?>

                                </div>
                            
                                <div>
                                    <?php echo Form::button('<span class="glyphicon glyphicon-trash"></span>', array('id' => 'btnRemovepropDD'."$key",'type' => 'button', 'class' => 'btn btn-danger','onClick' => 'delDiv(this.id);')); ?>    
                                </div>
                                <br>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    </div>                    
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-warning" value="Update"> 
                <a href="<?php echo e(route('pinnedarticle.show',Session::get('SiteId'))); ?>" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div> <!-- form horizontal-->

    <script type="text/javascript">

        // ------- ADDING DYNAMIC PANEL  ----------- //                         
        var $ddTemp = $("#propDD");              
        var propHash = <?php echo e(count($pinned_articles)); ?>;
        function addProperty()
        {                                    
            propHash++;
            var $newDD = $ddTemp.clone();       

            $newDD.attr("id","divpropDD"+propHash);
            $newDD.find(".btn.btn-danger")
                    .attr("id","btnRemovepropDD"+propHash);

            $newDD.find("#detail_name")
                    .attr("required","true");

            $newDD.find("#detail_value")
                    .attr("required","true");

            $("#dynamicProperty").append($newDD.fadeIn());
        }  

        function delDiv(id){    
            propHash--;

            var divID = id.replace("btnRemove","div"); 
            var element = document.getElementById(divID);

            element.parentNode.removeChild(element);
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>