<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/categoryclass.php');
  include('classes/productclass.php');
  include('classes/inquiryclass.php');
  $OBJ_CAT = new CATEGORY();
  $OBJ_INQ = new INQUIRY();
  $OBJ_PRO = new PRODUCT();
  $inqid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='view')
  {
      $OBJ_INQ->pid = $inqid;
      $res_inq = $OBJ_INQ->GetModInq();
      $OBJ_PRO->pcat = $res_inq[0]['pcat'];
      $resinq = $OBJ_PRO->GetCat();
  }
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Inquiry Details</div>
                <form action="" method="post">
                    <div class="element">
                        <b>Inquiry ID : </b><?php echo $res_inq[0]['p_id']; ?>
                    </div>
                    <div class="element">
                        <b>Inquiry Date : </b><?php echo $res_inq[0]['inq_date']; ?>
                    </div>
                    <div class="element">
                        <b>Company Name : </b><?php echo $res_inq[0]['cname']; ?>
                    </div>
                    <div class="element">
                        <b>Address : </b><?php echo $res_inq[0]['caddress']; ?>
                    </div>
                    <div class="element">
                        <b>Contact Person : </b><?php echo $res_inq[0]['cperson']; ?>
                    </div>
                    <div class="element">
                        <b>Contact Number : </b><?php echo $res_inq[0]['cno']; ?>
                    </div>
                    <div class="element">
                        <b>E-mail : </b><?php echo $res_inq[0]['email']; ?>
                    </div>
                    <div class="element">
                        <b>Product Category : </b><?php echo $resinq[0]['category_name']; ?>
                    </div>
                    <div class="element">
                        <b>Requirements : </b><?php echo $res_inq[0]['preq']; ?>
                    </div>
                    <div class="element">
                        <b>Quantity : </b><?php echo $res_inq[0]['quant']; ?>
                    </div>
                    <div class="element">
                        <b>Budget : </b><?php if($res_inq[0]['budget']=='0'){echo "Not Applicable";} else{echo $res_inq[0]['budget'];} ?>
                    </div>
                    <div class="element">
                        <b>Status : </b><?php if($res_inq[0]['status']==1){echo "<span style='color:red;'><b>Pending</b></span>";}elseif($res_inq[0]['status']==2){echo "<span style='color:#00AF00;'><b>Samples Sent</b></span>";} elseif($res_inq[0]['status']==3){echo "<span style='color:#00FF00;'><b>Order Received</b></span>";}?>
                    </div>
                    <div class="entry">
                        <a class="button edit" href="inquirypage.php?act=edit&id=<?php echo $res_inq[0]['p_id']; ?>">Edit Inquiry</a>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>