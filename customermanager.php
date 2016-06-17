<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/customerclass.php');
  $OBJ_CUST = new CUSTOMER();  
  $custid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='edit')
  {
      $OBJ_CUST->customer_id = $custid;
      $res_cust = $OBJ_CUST->GetCustomer();
  }
  

?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Customer Manager</div>
                <?php
  if(isset($_POST['add']) && $_POST['add']=='add')
  {
      extract($_POST);
      $OBJ_CUST->customer_company = $customer_company;
      $resname = $OBJ_CUST->GetAllCust();
      
      if($_POST['customer_company']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Customer company cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['customer_name']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Customer name cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['tin_no']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Customer TIN number cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d*\.?\d*$/i", $tin_no))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid TIN number.</p></div>        
      <?php
      }
      elseif($_POST['customer_address']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Customer address cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['customer_contact']=='')
      { ?>  
          <div class="n_warning"><p>Attention notification. Customer contact cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d{10}?$/", $customer_contact))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid contact number.</p></div>        
      <?php
      }
      elseif($_POST['customer_email']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Customer email address cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $customer_email))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid e-mail address.</p></div>        
      <?php
      }         
       elseif($_POST['customer_status']=='0')
      {  ?>
          <div class="n_warning"><p>Attention notification. Please select status.</p></div>
      <?php
      }
      else
      {
          $OBJ_CUST->customer_company = $_POST['customer_company'];
          $OBJ_CUST->customer_name = $_POST['customer_name'];
          $OBJ_CUST->customer_address = $_POST['customer_address'];
          $OBJ_CUST->customer_contact = $_POST['customer_contact'];
          $OBJ_CUST->tin_no = $_POST['tin_no'];
          $OBJ_CUST->customer_email = $_POST['customer_email'];
          $OBJ_CUST->customer_status = $_POST['customer_status'];
          if($action == "edit")
          {
              $OBJ_CUST->customer_id = $_POST['cusid'];
              $OBJ_CUST->EditCust();
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
          }
          else
          {   
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_CUST->AddCustomer();    
          }
        ?>
          <div class="n_ok"><p>Success notification. The user has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'customermanager.php'}, 2000) </script>";    
      }
      
  }
?>
                <form action="" method="post">
                    <div class="element">
                        <label for="name">Company Name<span class="red">(required)</span></label>
                        <input id="name" name="customer_company" class="text" value="<?php if(isset($customer_company)){echo $customer_company;}else{echo $res_cust[0]['customer_company'];} ?>"/>
                    </div>
                    <div class="element">
                        <label for="name">Person Name<span class="red">(required)</span></label>
                        <input id="name" name="customer_name" class="text" value="<?php if(isset($customer_name)){echo $customer_name;}else{echo $res_cust[0]['customer_name'];}?>" />
                    </div>
                    <div class="element">
                        <label for="name">Tin No.<span class="red">(required)</span></label>
                        <input id="name" name="tin_no" class="text" value="<?php if(isset($tin_no)){echo $tin_no;}else{echo $res_cust[0]['tin_no'];}?>"/>
                    </div>
                    <div class="element">
                        <label for="content">Address<span class="red">(required)</span></label>
                        <textarea name="customer_address" class="textarea" rows="10"><?php if(isset($customer_address)){echo $customer_address;}else{echo $res_cust[0]['customer_address'];} ?></textarea>
                    </div>
                    <div class="element">
                        <label for="name">Contact<span class="red">(required)</span></label>
                        <input id="customer_contact" name="customer_contact" class="text" value="<?php if(isset($customer_contact)){echo $customer_contact;}else{echo $res_cust[0]['customer_contact'];}?>"/>
                    </div>    
                    <div class="element">
                        <label for="name">E-mail<span></span></label>
                        <input id="name" name="customer_email" class="text " value="<?php if(isset($customer_email)){echo $customer_email;}else{echo $res_cust[0]['customer_email'];}?>"/>
                    </div>
                    <div class="element">
                        <label for="category">Status<span class="red">(required)</span></label>
                        <select name="customer_status">
                            <option value="0">------SELECT STATUS------</option>
                            <option value="1" <?php if(isset($customer_status) && $customer_status=="1"){echo "selected";}elseif($res_cust[0]['customer_status']=='1'){echo "selected";} ?>>Active</option>
                            <option value="2" <?php if(isset($customer_status) && $customer_status=="2"){echo "selected";}elseif($res_cust[0]['customer_status']=='2'){echo "selected";} ?>>Blocked</option>
                        </select>
                    </div>
                    <input type="hidden" name="cusid" value="<?php echo $res_cust[0]['customer_id']; ?>">
                    <div class="entry">
                        <button type="submit" class="add" name="add" value="add">Add Customer</button> <button class="cancel">Reset</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>