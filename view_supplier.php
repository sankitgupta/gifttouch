<?php
  include('header.php');
  include('sidemenu.php'); 
  //include('classes/categoryclass.php');
  include('classes/supplierclass.php');
  //$OBJ_CAT = new CATEGORY();
  $OBJ_SUP = new SUPPLIER();
  $supid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='view')
  {
      $OBJ_SUP->cid = $supid;
      $res_sup = $OBJ_SUP->GetModSupplier();
  }
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Supplier Details</div>
                <form action="" method="post">
                    <div class="element">
                        <b>Supplier ID : </b><?php echo $res_sup[0]['supplier_id']; ?>
                    </div>
                    
                    <div class="element">
                        <b>Company Name : </b><?php echo $res_sup[0]['supplier_firm_name']; ?>
                    </div>
                    <div class="element">
                        <b>Person Name : </b><?php echo $res_sup[0]['supplier_person_name']; ?>
                    </div>
                    <div class="element">
                        <b>Address : </b><?php echo $res_sup[0]['supplier_address']; ?>
                    </div>
                    <div class="element">
                        <b>Contact : </b><?php echo $res_sup[0]['supplier_contact']; ?>
                    </div>
                    <div class="element">
                        <b>Email : </b><?php echo $res_sup[0]['supplier_email']; ?>
                    </div>
                    <div class="element">
                        <b>Description : </b><?php echo $res_sup[0]['supplier_email']; ?>
                    </div>
                    <div class="element">
                        <b>Status : </b><?php if($res_sup[0]['supplier_status']==1){echo "<span style='color:green;'><b>Active</b></span>";}elseif($res_sup[0]['supplier_status']==2){echo "<span style='color:red;'><b>Blocked</b></span>";}?>
                    </div>
                    <div class="entry">
                        <a class="button" href="suppliermaster.php?act=edit&id=<?php echo $res_sup[0]['supplier_id']; ?>">Edit Supplier</a>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>