<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/categoryclass.php');
  $OBJ_CAT = new CATEGORY();
  $resname = $OBJ_CAT->GetAllCategory();
  ?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Category Manager</div>
<?php
    if(isset($_POST['add']) && $_POST['add']=='add')
    {
    extract($_POST);
    $OBJ_CAT->catname = $cname;
    $chkname = $OBJ_CAT->GetCatName();   
      
      if($_POST['cname']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Category name cannot be empty.</p></div>
      <?php
      }
      elseif(!empty($chkname))
      {  ?>
          <div class="n_error"><p>Error notification. This category already exists.</p></div>        
      <?php
      }
      else     
      {
          $OBJ_CAT->catname = $_POST['cname'];
          
          $OBJ_CAT->AddCategory();  ?>
          <div class="n_ok"><p>Success notification. The category has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'categorymanager.php'}, 1000) </script>";    
      }
            
    }
?>
                <form action="" method="post">
                    <div class="element">
                        <label for="name">Category Name <span class="red">(required)</span></label>
                        <input id="name" name="cname" class="text"/>
                    </div>
                     <!--<div class="element">
                        <label for="category">Category <span class="red">(required)</span></label>
                        <select name="category" >
                            <option value="0">--SELECT STATUS--</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 4</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>-->
                    <div class="entry">
                        <button type="submit" class="add" name="add" value="add">Add Category</button> <button class="cancel">Reset</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>