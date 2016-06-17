<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/categoryclass.php');
  include('classes/inquiryclass.php');
  $OBJ_CAT = new CATEGORY();
  $OBJ_INQ = new INQUIRY();
  $res_catname = $OBJ_CAT->GetAllCategory();
  $inqid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='edit')
  {
      $OBJ_INQ->pid = $inqid;
      $res_inq = $OBJ_INQ->GetModInq();
  }
  //$res_inq = $OBJ_INQ->AddInq();
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Add an Inquiry</div>
                <?php
  if(isset($_POST['do']) && $_POST['do']=='add')
  {
      extract($_POST);
      $OBJ_INQ->cname = $cname;      
      if($_POST['cname']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Company name cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['caddress']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Company address cannot be empty.</p></div>
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
      elseif(!preg_match("/^\d{10}$/", $cno))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid contact number.</p></div>        
      <?php
      }
       elseif($_POST['email']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. E-mail cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid e-mail address.</p></div>        
      <?php
      }
      elseif($_POST['pcat']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Please select product category.</p></div>
      <?php
      }
      elseif($_POST['preq']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Product requirement cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['quant']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Product quantity cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d*$/i", $quant))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid quantity.</p></div>        
      <?php
      }
      elseif($_POST['inq_date']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Inquiry date cannot be empty.</p></div>
      <?php
      }
       elseif($_POST['status']=='0' || $_POST['status']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Please select status.</p></div>
      <?php
      }
      else
      {
          $OBJ_INQ->cname = $_POST['cname'];
          $OBJ_INQ->caddress = $_POST['caddress'];
          $OBJ_INQ->cperson = $_POST['cperson'];
          $OBJ_INQ->cno = $_POST['cno'];
          $OBJ_INQ->email = $_POST['email'];
          $OBJ_INQ->pcat = $_POST['pcat'];
          $OBJ_INQ->preq = $_POST['preq'];
          $OBJ_INQ->quant = $_POST['quant'];
          $OBJ_INQ->budget = $_POST['budget'];
          $OBJ_INQ->inq_date = $_POST['inq_date'];
          $OBJ_INQ->status = $_POST['status'];
          if($action == "edit")
          {
              $OBJ_INQ->pid = $_POST['inquid'];
              $OBJ_INQ->EditInq();
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
          }
          else
          {   
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_INQ->AddInq();    
          }
?>
          <div class="n_ok"><p>Success notification. The user has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'inquirypage.php'}, 1000) </script>";    
      }
      
  }
?>
               <form action="" method="post">
                 <div class="element">
                        <label for="name">Company Name<span class="red">(required)</span></label>
                        <input id="name" name="cname" class="text" value="<?php if(isset($cname)){echo $cname;}else{echo $res_inq[0]['cname'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="content">Address<span class="red">(required)</span></label>
                        <textarea name="caddress" class="textarea" rows="5"><?php if(isset($caddress)){echo $caddress;}else{echo $res_inq[0]['caddress'];} ?></textarea>
                    </div>
                    <div class="element">
                        <label for="name">Contact Person<span class="red">(required)</span></label>
                        <input id="name" name="cperson" class="text" value="<?php if(isset($cperson)){echo $cperson;}else{echo $res_inq[0]['cperson'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="name">Contact Number<span class="red">(required)</span></label>
                        <input id="name" name="cno" class="text" value="<?php if(isset($cno)){echo $cno;}else{echo $res_inq[0]['cno'];} ?>"/>
                    </div>
                     <div class="element">
                        <label for="name">E-mail<span></span></label>
                        <input id="name" name="email" class="text" value="<?php if(isset($email)){echo $email;}else{echo $res_inq[0]['email'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="category">Product Category <span class="red">(required)</span></label>
                        <select name="pcat" class="" >
                            <option value="0">--------------SELECT CATEGORY--------------</option>
                            <?php for($a=0; $a<count($res_catname); $a++) { ?>
                            <option value="<?php echo $res_catname[$a]['category_id']; ?>" <?php if(isset($pcat) && $pcat==$res_catname[$a]['category_id']){echo "selected";}elseif($res_inq[0]['pcat']==$res_catname[$a]['category_id']){echo "selected";} ?>><?php echo $res_catname[$a]['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="element">
                        <label for="content">Product Requirement<span class="red">(required)</span></label>
                        <textarea name="preq" class="textarea" rows="5"><?php if(isset($preq)){echo $preq;}else{echo $res_inq[0]['preq'];} ?></textarea>
                    </div>
                     <div class="element">
                        <label for="name">Quantity<span class="red">(required)</span></label>
                        <input id="name" name="quant" class="text" value="<?php if(isset($quant)){echo $quant;}else{echo $res_inq[0]['quant'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="name">Budget<span></span></label>
                        <input id="name" name="budget" class="text" value="<?php if(isset($budget)){echo $budget;}else{echo $res_inq[0]['budget'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="date">Inquiry Date <span class="red">(required)</span></label>
                        <input name="inq_date" class="" type="date" value="<?php if(isset($inq_date)){echo $inq_date;}else{echo $res_inq[0]['inq_date'];} ?>"/>
                    </div>
                     <div class="element">
                        <label for="category">Status<span class="red">(required)</span></label>
                        <select name="status" class="" >
                            <option value="0">-- SELECT STATUS --</option>
                            <option value="1" <?php if(isset($status) && $status=="1"){echo "selected";}elseif($res_inq[0]['status']=='1'){echo "selected";}?>>Pending</option>
                            <option value="2" <?php if(isset($status) && $status=="2"){echo "selected";}elseif($res_inq[0]['status']=='2'){echo "selected";} ?>>Samples Sent</option>
                            <option value="3" <?php if(isset($status) && $status=="3"){echo "selected";}elseif($res_inq[0]['status']=='3'){echo "selected";} ?>>Order Received</option>
                            <option value="4" <?php if(isset($status) && $status=="4"){echo "selected";}elseif($res_inq[0]['status']=='4'){echo "selected";} ?>>Order Delivered</option>
                        </select>
                    </div>
                    <input type="hidden" name="inquid" value="<?php echo $res_inq[0]['p_id']; ?>">
                    <div class="entry">
                        <button type="submit" class="add" name="do" value="add">Add Inquiry</button> <button class="cancel">Cancel</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>