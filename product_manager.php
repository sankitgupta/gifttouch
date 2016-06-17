<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/productclass.php');
  include('classes/categoryclass.php');
  $OBJ_PRO = new PRODUCT();
  $OBJ_CAT = new CATEGORY();
  $prodid = $_GET['id'];
  $action = 'addproduct';
  if(isset($_GET['act']) && $_GET['act']!='')
  {
    $action = $_GET['act'];
  }
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='edit')
  {
      $OBJ_PRO->pid = $prodid;
      $res_pro = $OBJ_PRO->GetPro();
      $pimg = $res_pro[0]['product_image'];
  }
  
   $res_catname = $OBJ_CAT->GetAllCategory();
  
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Product Master</div>
                 <?php
  if(isset($_POST['add']) && $_POST['add']=='add')
  {
      extract($_POST);
      $OBJ_PRO->pname = $pname;
      $resname = $OBJ_PRO->GetProduct();
      $chkname = $OBJ_PRO->GetProName();
      
      if($_POST['pname']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Product name cannot be empty.</p></div>
      <?php
      }
      /*elseif(!empty($chkname))
      { //if($action != "edit")
          ?>
          <div class="n_error"><p>Error notification. This product already exists.</p></div>        
      <?php
      }*/
      
      elseif($_POST['pcat']=='0')
      { ?>
          <div class="n_warning"><p>Attention notification. Category cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['pdesc']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Product description cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['pcat']=='0')
      { ?>
          <div class="n_warning"><p>Attention notification. Category cannot be empty.</p></div>
      <?php
      }
       elseif($_POST['pquant']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Quantity cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d*$/i", $quantity))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid quantity. Please enter only numerics.</p></div>        
      <?php
      }
      elseif($_POST['rate']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Product rate cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d*\.?\d*$/i", $rate))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid amount. Please enter only numerics.</p></div>        
      <?php
      }
       elseif($_POST['status']=='0')
      {  ?>
          <div class="n_warning"><p>Attention notification. Please select status.</p></div>
      <?php
      }
      else     
      {
        if($_FILES["attach"]["name"]!='')
        {
            $allowedExts = array("gif","jpeg","jpg","png");
            $temp = explode(".", $_FILES["attach"]["name"]);
            $extension = strtolower(end($temp));
            if ((($_FILES["attach"]["type"] == "image/gif")
            || ($_FILES["attach"]["type"] == "image/jpeg")
            || ($_FILES["attach"]["type"] == "image/jpg")
            || ($_FILES["attach"]["type"] == "image/pjpeg")
            || ($_FILES["attach"]["type"] == "image/x-png")
            || ($_FILES["attach"]["type"] == "image/png"))
            && ($_FILES["attach"]["size"] < 2200000)
            && in_array($extension, $allowedExts))
            {
              if ($_FILES["attach"]["error"] > 0)
              {
                $msg = "Return Code: " . $_FILES["attach"]["error"];
                echo "<script type='text/javascript'>window.location.href = 'product_manager.php?err=fail&msg=$msg'; </script>"; 
              }
              else
              {
                /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/

                if (file_exists("img/products/".$_FILES["attach"]["name"]))
                {
                    $_FILES["attach"]["name"]="copy-".$_FILES["attach"]["name"];
                }   
                $OBJ_PRO->image = $_FILES["attach"]["name"];
                move_uploaded_file($_FILES["attach"]["tmp_name"],"img/products/".$_FILES["attach"]["name"]);
              }
            }
            else
            {   
                $msg = "Image not uploaded. Please select image with following extension (JPG,JPEG,PNG,GIF). Max size 2 MB";
                echo "<script type='text/javascript'>window.location.href = 'product_manager.php?err=fail&msg=$msg'; </script>"; 
            }
        }
        else
        {
            if($_POST['ac']=='addproduct')
            {
                $OBJ_PRO->image = '';
            }
            else
            {
                $OBJ_PRO->image = $pimg;
            }
        }
          $OBJ_PRO->pname = $_POST['pname'];
          $OBJ_PRO->pcat = $_POST['pcat'];
          $OBJ_PRO->pdesc = $_POST['pdesc'];
          //$OBJ_PRO->image = $_POST['image'];
          $OBJ_PRO->pquant = $_POST['pquant'];
          $OBJ_PRO->status = $_POST['status'];
          $OBJ_PRO->prate = $_POST['rate'];
           if($action == "edit")
          {
              $OBJ_PRO->pid = $_POST['proid'];
              $OBJ_PRO->EditPro();
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
          }
          else
          {   
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_PRO->AddProduct();    
          }
        
      ?>
          <div class="n_ok"><p>Success notification. The user has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'product_manager.php'}, 1000) </script>";    
      }
      
  }
  
  
if(isset($_GET['err']) && $_GET['err']=='fail')
{
    ?>
    <div class="n_warning"><p><?php echo $_GET['msg']; ?></p></div>
    <?php
}
?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="element">
                        <label for="name">Product Name<span class="red">(required)</span></label>
                        <input id="name" name="pname" class="text" value="<?php if(isset($pname)) {echo $pname;} else{echo $res_pro[0]['product_name'];}?>"/>
                    </div>
                    <div class="element">
                        <label for="category">Category<span class="red">(required)</span></label>
                        <select name="pcat">
                            <option value="0">-- select category --</option>
                            <?php for($a=0; $a<count($res_catname); $a++) { ?>
                            <option value="<?php echo $res_catname[$a]['category_id']; ?>" <?php if(isset($pcat) && $pcat==$res_catname[$a]['category_id']){echo "selected";}elseif($res_pro[0]['category_name']==$res_catname[$a]['category_id']){echo "selected";}?>><?php echo $res_catname[$a]['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="element">
                        <label for="content">Product Description<span class="red">(required)</span></label>
                        <textarea name="pdesc" class="textarea" rows="5"><?php if(isset($pdesc)) {echo $pdesc;}else{echo $res_pro[0]['product_description'];} ?></textarea>
                    </div>
                    <div class="element">
                        <label for="attach">Product Image<span class="red">(required)</label>
                        <input type="file" name="attach" value="<?php if(isset($attach)) {echo $attach;}?>"/>
                        <?php
                        if($pimg!='')
                        {
                            echo "<img src='img/products/$pimg' alt='image' width='80'/>";
                        }
                         ?>
                    </div>
                     <div class="element">
                        <label for="name">Quantity<span class="red">(required)</span></label>
                        <input id="name" name="pquant" class="text" value="<?php if(isset($pquant)) {echo $pquant;} else{echo $res_pro[0]['product_quantity'];}?>"/>
                    </div>      
                    <div class="element">
                        <label for="name">Rate<span class="red">(required)</span></label>
                        <input id="name" name="rate" class="text" value="<?php if(isset($rate)) {echo $rate;} else{echo $res_pro[0]['Rate'];}?>"/>
                    </div>      
                    <div class="element">
                        <label for="category">Status<span class="red">(required)</span></label>
                        <select name="status" >
                            <option value="0">-- select status --</option>
                            <option value="1" <?php if(isset($status) && $status=="1"){echo "selected";} elseif($res_pro[0]['Status']=='1'){echo "selected";}?>>Active</option>
                            <option value="2" <?php if(isset($status) && $status=="2"){echo "selected";}elseif($res_pro[0]['Status']=='2'){echo "selected";} ?>>Blocked</option>
                        </select>
                    </div>   
                     <input type="hidden" name="proid" value="<?php echo $res_pro[0]['product_id']; ?>">                                           
                     <input type="hidden" name="ac" value="<?php echo $action; ?>">                                           
                    <div class="entry">
                        <button type="submit" class="add" name="add" value="add">Add Product</button> <button class="cancel">Reset</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>