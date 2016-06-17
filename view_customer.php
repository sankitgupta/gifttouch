<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/categoryclass.php');
  include('classes/customerclass.php');
  $OBJ_CAT = new CATEGORY();
  $OBJ_CUST = new CUSTOMER();
  $custid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='view')
  {
      $OBJ_CUST->customer_id = $custid;
      $res_cust = $OBJ_CUST->GetCustomer();
  }
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Customer Details</div>
                <form action="" method="post">
                    <div class="element">
                        <b>Customer ID : </b><?php echo $res_cust[0]['customer_id']; ?>
                    </div>
                    
                    <div class="element">
                        <b>Company Name : </b><?php echo $res_cust[0]['customer_company']; ?>
                    </div>
                    <div class="element">
                        <b>Person Name : </b><?php echo $res_cust[0]['customer_name']; ?>
                    </div>
                    <div class="element">
                        <b>Tin Number : </b><?php echo $res_cust[0]['tin_no']; ?>
                    </div>
                    <div class="element">
                        <b>Address : </b><?php echo $res_cust[0]['customer_address']; ?>
                    </div>
                    <div class="element">
                        <b>Contact : </b><?php echo $res_cust[0]['customer_contact']; ?>
                    </div>
                    <div class="element">
                        <b>Email : </b><?php echo $res_cust[0]['customer_email']; ?>
                    </div>
                    <div class="element">
                        <b>Status : </b><?php if($res_cust[0]['customer_status']==1){echo "<span style='color:green;'><b>Active</b></span>";}elseif($res_cust[0]['customer_status']==2){echo "<span style='color:red;'><b>Blocked</b></span>";}?>
                    </div>
                    <div class="entry">
                        <a class="button" href="customermanager.php?act=edit&id=<?php echo $res_cust[0]['customer_id']; ?>">Edit Customer</a>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>