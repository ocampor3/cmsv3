<?php $__env->startSection('title'); ?>

<?php if(Auth::user()->Id == $user[0]->Id): ?>
Editing Profile | Roche
<?php else: ?>
Edit Account | Roche
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>

<?php if(Auth::user()->Id == $user[0]->Id): ?>
Editing Profile
<?php else: ?>
Editing Account of <b> <?php echo e($user[0]->UserName); ?></b>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo Form::model($user, [
    'method' => 'PATCH',
    'route' => ['user.update', $user[0]->Id],
    'files' => 'true',
    'onsubmit' => 'return validateFields();'
    ]); ?>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Account Details</h3>            
        </div>
        <!-- /.box-header -->

        <div class="box-body no-padding">
            <div class="panel-body">
                <div class="form-horizontal">

                    <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">   
                        <label class="col-sm-2 control-label">Full Name: </label>
                        <div class="col-sm-3">
                            <input class="form-control" name="name" type="text" maxlength="160" value="<?php echo e($user[0]->FullName); ?>" required />

                            <?php if($errors->has('name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                            <?php endif; ?>

                        </div>  
                    </div> 

                    <div class="form-group <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                        <label class="col-sm-2 control-label">Username: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="username" maxlength="160" value="<?php echo e($user[0]->UserName); ?>" required />

                            <?php if($errors->has('username')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('username')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group <?php echo e($errors->has('pincode') ? ' has-error' : ''); ?>">
                        <label class="col-sm-2 control-label">Default Pincode: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="pincode" value="<?php echo e($user[0]->Pincode); ?>" />

                            <?php if($errors->has('pincode')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('pincode')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(Auth::user()->UserGroup == 'Admin'): ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">User Group: </label>
                        <div class="col-sm-3">

                            <?php echo Form::select('usergroup', ['Admin' => 'Admin','Owner' => 'Owner',
                            'Member' => 'Member', 'Visitor' => 'Visitor'], $user[0]->UserGroup, ['id' => '', 'class' => 'form-control', 'placeholder' => '--Select Type--' ,'required']); ?> 

                        </div>
                    </div>


                    <!-- <?php if(Auth::user()->UserGroup == 'Admin'): ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Site to Handle: </label>
                            <div class="col-sm-3">
                                <?php echo Form::select('sitecode', $site, $user[0]->SiteCode, ['id' => 'type-option', 'class' => 'form-control', 'placeholder' => '--Select Type--' ,'required']); ?> 
                            </div>
                        </div>
                        <?php endif; ?> -->

                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Security Group: </label>
                            <div class="col-sm-3">
                                <?php echo Form::select('securitygroup', $securitygroups, $user[0]->SecurityGroupId, ['id' => '', 'class' => 'form-control', 'placeholder' => '--Select Type--' ,'required']); ?> 
                            </div>
                        </div> -->

                        <?php elseif(Auth::user()->Id != $user[0]->Id ): ?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">User Group: </label>
                            <div class="col-sm-3">                                

                                <?php echo Form::select('usergroup', ['Owner ' => 'Owner',
                                'Member' => 'Member', 'Visitor' => 'Visitor'], $user[0]->UserGroup, ['id' => '', 'class' => 'form-control', 'placeholder' => '--Select Type--' ,'required']); ?> 

                            </div>
                        </div>
                        
                        <?php if(Auth::user()->UserGroup == 'Owner'): ?>
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Security Group: </label>
                            <div class="col-sm-3">
                                <?php echo Form::select('securitygroup', $securitygroups, $user[0]->SecurityGroupId, ['id' => '', 'class' => 'form-control', 'placeholder' => '--Select Type--' ,'required']); ?> 
                            </div>
                        </div> -->
                        <?php endif; ?>



                        <?php endif; ?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Default Web Domain: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="domain" name="domain" value="<?php echo e($user[0]->Domain); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Default Web Username: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="domainuserid" name="domainuserid" value="<?php echo e($user[0]->DomainUserId); ?>" />
                                <span class="help-block" id="help-domain-userid-block" style='display:none;'>
                                    <strong><label id="domain-userid-error"></label></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Default Web Password: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="password" id="domainpassword" name="domainpassword" value="<?php echo e($user[0]->DomainPassword); ?>" />
                                <span class="help-block" id="help-domain-password-block" style='display:none;'>
                                    <strong><label id="domain-password-error"></label></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Sites Handled</label>
                            <div class="col-sm-10">
                                <a id="addProperty" class="btn btn-success" onClick="addProperty();"><span class="glyphicon glyphicon-plus"></span> Add Handled Site</a>
                                <span class="help-block" id="help-sites-handled-block" style='display:none;'>
                                    <strong><label id="sites-handled-error"></label></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group" style="display:none;">   
                            <div class="col-sm-10"> 
                                <div id="propDD">

                                    <?php if(Auth::user()->UserGroup == 'Admin'): ?>                            
                                    <div class="col-sm-3">                              
                                        <?php echo Form::select('sitecodeTemp', $site, null, ['id' => 'type-option', 'class' => 'form-control sitedropdown', 'placeholder' => '--Select Site--']); ?>

                                    </div>
                                    <div class="col-sm-3">                              

                                       <?php echo Form::select('sitecodesgTemp', [], null, ['id' => '', 'class' => 'form-control securityGroupDropDown', 'placeholder' => '--Select Security Group--']); ?>


                                   </div>
                                   <?php elseif(Auth::user()->UserGroup == 'Owner'): ?>
                                   <div class="col-sm-3">                              
                                    <?php echo Form::select('sitecodeTemp', Auth::user()->handledSites->pluck('Title', 'Id'), null, ['id' => '', 'class' => 'form-control ', 'placeholder' => '--Select Site--']); ?>

                                </div>
                                <div class="col-sm-3">                              

                                  <?php echo Form::select('sitecodesgTemp', [], null, ['id' => '', 'class' => 'form-control securityGroupDropDown', 'placeholder' => '--Select Security Group--']); ?>



                              </div>
                              <?php endif; ?>                          

                              <div>
                                <?php echo Form::button('<span class="glyphicon glyphicon-trash"></span>', array('id' => 'btnRemove' ,'type' => 'button', 'class' => 'btn btn-danger','onClick' => 'delDiv(this.id);')); ?>    
                            </div>
                            <br>                            
                        </div>                                               
                    </div>
                </div>

                <div class="form-group">                     
                    <label for="title" class="col-sm-2 control-label"></label> 
                    <div id="dynamicProperty" class="col-sm-10">  

                        <?php $__currentLoopData = $user[0]['usersite']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <div id="divpropDD<?php echo e($key); ?>" class="" style="">
                            <?php if(Auth::user()->UserGroup == 'Admin'): ?> 
                            <div class="col-sm-3">                              
                                <?php echo Form::select('sitecode[]', $site,$s->SiteCode, ['id' => '', 'class' => 'form-control sitedropdown', 'placeholder' => '--Select Site--']); ?>

                            </div>
                            <div class="col-sm-3">                              

                               <?php echo Form::select('sitecodesg[]', [], null, ['id' => '', 'class' => 'form-control securityGroupDropDown', 'placeholder' => '--Select Security Group--']); ?>

                           </div>
                           <?php elseif(Auth::user()->UserGroup == 'Owner'): ?>
                           <div class="col-sm-3">
                            <?php echo Form::select('sitecode[]', Auth::user()->handledSites->pluck('Title', 'Id'),$s->SiteCode, ['id' => '', 'class' => 'form-control sitedropdown', 'placeholder' => '--Select Site--']); ?>


                        </div>

                        <div class="col-sm-3">

                            <?php echo Form::select('sitecodesg[]', [], null, ['id' => '', 'class' => 'form-control securityGroupDropDown', 'placeholder' => '--Select Security Group--']); ?>


                        </div>
                        <?php endif; ?>

                        <div>
                            <?php echo Form::button('<span class="glyphicon glyphicon-trash"></span>', array('id' => 'btnRemovepropDD'."$key"  ,'type' => 'button', 'class' => 'btn btn-danger','onClick' => 'delDiv(this.id);')); ?>

                        </div>
                        <br>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                </div>                    
            </div>

        </div>
    </div>
</div>
<!-- /.box-body -->                
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Password</h3>            
    </div>
    <!-- /.box-header -->

    <div class="box-body no-padding">
        <div class="panel-body">
            <div class="form-horizontal">    

                <!-- show old password check for editing profile only -->
                <?php if(Auth::user()->Id == $user[0]->Id): ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Old Password: </label>
                    <div class="col-sm-3">
                        <input class="form-control" name="oldPass" type="password" />
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Password: </label>
                    <div class="col-sm-3">
                        <input class="form-control" name="password" type="password" minlength="6" />

                        <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group <?php echo e($errors->has('confirmPassword') ? ' has-error' : ''); ?>">
                    <label class="col-sm-2 control-label">Re-type Password: </label>
                    <div class="col-sm-3">
                        <input class="form-control" name="confirmPassword" type="password" minlength="6" />

                        <?php if($errors->has('confirmPassword')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('confirmPassword')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.box-body -->                
</div>

<div class="panel-body">
    <div class="form-horizontal" style="margin-left: -15px; margin-top: -15px;">
        <div class="form-group">   

            <div class="col-sm-3">                
                <input id="button" type="submit" value="Update" class="btn btn-warning"/>
                <a href="<?php echo e(url('/')); ?>" class = "btn btn-danger" >
                    Cancel 
                </a> 
            </div>  

        </div>
    </div>
</div>

<?php echo Form::close(); ?>


<script type="text/javascript">

    // ------- ADDING DYNAMIC PANEL  ----------- //                         

    var $ddTemp = $("#propDD");              
    var propHash = $(".sitedropdown").length;
    //1 + <?php echo e(count($user[0]['usersite'])); ?>;

    function addProperty()
    {         
        propHash = $(".sitedropdown").length;                           
        var $newDD = $ddTemp.clone();       

        $newDD.attr("id","divpropDD"+propHash);
        $newDD.find(".btn.btn-danger")
        .attr("id","btnRemovepropDD"+propHash);

        $newDD.find("#detail_name")
        .attr("required","true");

        $newDD.find("#detail_value")
        .attr("required","true");

        $newDD.find("select[name='sitecodeTemp']").attr("name","sitecode[]");
        $newDD.find("select[name='sitecodesgTemp']").attr("name","sitecodesg[]");

        $("#dynamicProperty").append($newDD.fadeIn());
        SubscribeFunctions();
    }  

    function delDiv(id){    
        var propHash = propHash - 1;

        var divID = id.replace("btnRemove","div"); 
        var element = document.getElementById(divID);

        element.parentNode.removeChild(element);
        disableDropDown();
    }

    function validateFields() {
        return validateSites() && validateDomainFields();
    }

    function validateSites() {
        var size = document.getElementsByName('sitecode[]').length;
        for(i=0; i<size; i++) {
            if(document.getElementsByName('sitecode[]')[i].value != '') return true;
        }
        $('#sites-handled-error').text("Please provide at least one site handled.");
        $('#help-sites-handled-block').css('display','block');
        return false;
    }

    function validateDomainFields() {
        var domain = $('#domain').val();
        var domainuserid = $('#domainuserid').val();
        var domainpassword = $('#domainpassword').val();

        // reset
        $('#domain-userid-error').text('');
        $('#domain-password-error').text('');
        $('#help-domain-userid-block').css('display','none');
        $('#help-domain-password-block').css('display','none');

        if(domain != '' && domainuserid == '') {
            $('#domain-userid-error').text("Username should not be empty if there is a default domain.");
            $('#help-domain-userid-block').css('display','block');
            return false;
        }

        if(domainuserid != '' && domainpassword == '') {
            $('#domain-password-error').text("Please provide default domain password.");
            $('#help-domain-password-block').css('display','block');
            return false;
        }

        return true;
    }


    function SubscribeFunctions(){

        $( ".sitedropdown" ).on( "change", function() {
          var id = $( this ).parent().parent().attr("id");
          var value = $("#"+id+" select.sitedropdown").find(":selected").val();
          updateSGDropdown(id,value,true);
      });

        disableDropDown();

    }
    function updateSGDropdown(id,val,block = false){

        var param = {
            url:'/User/getSecurityGrouBySiteId',
            data:{SiteId:val},
            dataType:"JSON",
            type:'GET',
            async:false
            

        }

        main.ajax(param,function(response){

           $("#"+id+" select.securityGroupDropDown option").remove()
           var $el = $("#"+id+" select.securityGroupDropDown");
           var arr = response.data;

           $el.append($("<option></option>").attr("value", "").text('--Select Security Group--'));
           for(var item in arr){
            $el.append($("<option></option>").attr("value", arr[item].Id).text(arr[item].DisplayName));
        }



    },block);

        disableDropDown();

    }

    function disableDropDown(){

        //disable options
        var values = $("select[name='sitecode[]']")
        .map(function(){return $(this).find(":selected").val();}).get();

        $("select[name='sitecode[]'] option").each(function(i,val){ 
            var parent = $(this).parent().find(":selected").val();
            if(values.indexOf(String($(this).attr('value')))>=0 && parent!=String($(this).attr('value'))){
                //console.log($(this).attr("value")) 
                $(this).prop("disabled",true);
                $(this).css("background-color", "#B0ABAA");

            }else{
                $(this).prop("disabled",false);
                $(this).css("background-color", "transparent");

            }


        });

    };

    $(function(){
        $.blockUI();

        var initSGSite = <?php echo $initSiteSG; ?>;
        setTimeout(function(){

        SubscribeFunctions();
        


        var values = $("select[name='sitecode[]']")
        .map(function(){return $(this).find(":selected").val();}).get();

        
        $( ".sitedropdown").each(function(i,key){
          var id = $( this ).parent().parent().attr("id");
          var value = $("#"+id+" select.sitedropdown").find(":selected").val();
          updateSGDropdown(id,value,false);


          var obj = initSGSite.find(function(item){

                    return String(item.SiteCode) == String(value);
          });
          
          if(obj){
            if(obj.SecurityGroupId)
            $("#"+id+" select.securityGroupDropDown").val(String(obj.SecurityGroupId));

          }else{

            
          }
          

        });
         $.unblockUI();
       },500);


    })
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>