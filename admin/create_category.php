<?php
 require_once 'header.php'; 
 require_once 'class/category.class.php';
 $category = new Category();
 if(isset($_POST['save'])){
    $err = [];
    if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
        $category->set('name',$_POST['name']);
    }else{
        $err['name'] = 'Enter Name';
    }
 
    if(isset($_POST['rank']) && !empty($_POST['rank'])){
        if($_POST['rank']>0){
          $category->set('rank',$_POST['rank']);
        }else{
            $err['rank'] = 'Enter positive number';
        }
        
    }else{
        $err['rank'] = 'Enter Rank';
    }

      $category->set('status',$_POST['status']);
      $category->set('created_by',$_SESSION['admin_username']);
      $category->set('created_date',date('Y-m-d H-i-s'));


      if(count($err)==0){
        $msg = $category->create();
      }
}


?>






        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Management</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action='' method='post'>
                                        <?php if(isset($msg)){ echo $msg;} ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name='name' class="form-control"> <?php if(isset($err['name'])){ echo $err['name'];} ?>
                                        
                                        </div>

                                         <div class="form-group">
                                            <label>Rank</label>
                                            <input type='number' name='rank' class="form-control">  <?php if(isset($err['rank'])){ echo $err['rank'];} ?>
                                        
                                        </div>
                                       
                                      
                                       
                                      
                                       
                                      
                                        <div class="form-group">
                                            <label>Status</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="active" value="1">Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="deactive" value="0" checked>De-active
                                            </label>
                                            
                                        </div>
                                        
                                        <button type="submit" name='save' class="btn btn-info">Save Category</button>
                                        <button type="reset" class="btn btn-danger">Clear</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 <?php  require_once 'footer.php'; ?>