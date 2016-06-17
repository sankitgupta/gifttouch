<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/supplierclass.php');
  
  $OBJ_SUP = new SUPPLIER();
  $suppid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='edit')
  {
      $OBJ_SUP->cid = $suppid;
      $res_sup = $OBJ_SUP->GetModSupplier();
  }
  
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Supplier Manager</div>
               <?php   
  if(isset($_POST['do']) && $_POST['do']=='add')
  {
      extract($_POST);
      $OBJ_SUP->supplier_firm_name = $cname;      
      if($_POST['cname']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Supplier firm name cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['caddress']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Supplier address cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['cperson']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Contact person name cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['cno']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Contact number cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d{10}?$/", $cno))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid contact number.</p></div>        
      <?php
      }
      elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid e-mail address.</p></div>        
      <?php
      }
      elseif($_POST['sdesc']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Supplier description cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['status']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Status cannot be empty.</p></div>
      <?php
      }
      else
      {
          $OBJ_SUP->cname = $_POST['cname'];
          $OBJ_SUP->caddress = $_POST['caddress'];
          $OBJ_SUP->cperson = $_POST['cperson'];
          $OBJ_SUP->cno = $_POST['cno'];
          $OBJ_SUP->email = $_POST['email'];
          $OBJ_SUP->sdesc = $_POST['sdesc'];
          $OBJ_SUP->status = $_POST['status'];
          if($action == "edit")
          {
              $OBJ_SUP->cid = $_POST['supid'];
              $OBJ_SUP->EditSupplier();
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
          }
          else
          {   
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_SUP->AddSupplier();    
          }
          ?>
          <div class="n_ok"><p>Success notification. The supplier has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'suppliermaster.php'}, 1200) </script>";    
      }
      
  }
?>
                <form action="" method="post">
                    <div class="element">
                        <label for="name">Company Name<span class="red">(required)</span></label>
                        <input id="name" name="cname" class="text " value="<?php if(isset($cname)){echo $cname;}else{echo $res_sup[0]['supplier_firm_name'];} ?>"/>
                    </div> 
                    <div class="element">
                        <label for="content">Address<span class="red">(required)</span></label>
                        <textarea name="caddress" class="textarea" rows="5"><?php if(isset($caddress)){echo $caddress;}else{echo $res_sup[0]['supplier_address'];} ?></textarea>
                    </div>
                     <div class="element">
                        <label for="name">Contact Person<span class="red">(required)</span></label>
                        <input id="name" name="cperson" class="text" value="<?php if(isset($cperson)){echo $cperson;}else{echo $res_sup[0]['supplier_person_name'];}?>"/>
                    </div>
                    <div class="element">
                        <label for="name">Contact Number<span class="red">(required)</span></label>
                        <input id="name" name="cno" class="text" value="<?php if(isset($cno)){echo $cno;}else{echo $res_sup[0]['supplier_contact'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="name">E-mail<span></span></label>
                        <input id="name" name="email" class="text" value="<?php if(isset($email)){echo $email;} else{echo $res_sup[0]['supplier_email'];}?>"/>
                    </div>
                    <div class="element">
                        <label for="content">Supplier Description<span class="red">(required)</span></label>
                        <textarea name="sdesc" class="textarea" rows="5"><?php if(isset($sdesc)){echo $sdesc;} else{echo $res_sup[0]['supplier_description'];}?></textarea>
                    </div>
                    <div class="element">
                        <label for="category">Status<span class="red">(required)</span></label>
                        <select name="status">
                            <option value="0">-- SELECT STATUS --</option>
                            <option value="1" <?php if(isset($status) && $status=="1"){echo "selected";} elseif($res_sup[0]['supplier_status']=='1'){echo "selected";} ?>>Active</option>
                            <option value="2" <?php if(isset($status) && $status=="2"){echo "selected";} elseif($res_sup[0]['supplier_status']=='2'){echo "selected";} ?>>Blocked</option>
                            </select>
                    </div>
                           <input type="hidden" name="supid" value="<?php echo $res_sup[0]['supplier_id']; ?>">                
                    <div class="entry">
                        <button type="submit" class="add" name="do" value="add">Add Supplier</button> <button class="cancel">Reset</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>