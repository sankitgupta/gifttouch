<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/productclass.php');
  include('classes/poclass.php');
  $OBJ_PRO = new PRODUCT();
  $OBJ_PO = new PO();
  $poid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='view')
  {
      $OBJ_PO->poid = $poid;
      $res_inq = $OBJ_PO->GetModPo();
      $OBJ_PO->sid = $res_inq[0]['supplier_id'];
      $resinq = $OBJ_PO->POSup();
      $res_popro=$OBJ_PO->GetPOPro();
  }
  $respo = $OBJ_PO->GetPODescription();
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Purchase Order Details</div>
                <form action="" method="post">
                    <div class="element">
                        <b>Purchase Order ID : </b><?php echo $res_inq[0]['payorder_id']; ?>
                    </div>
                    <div class="element">
                        <b>Purchase Order Date : </b><?php echo $res_inq[0]['payorder_date']; ?>
                    </div>
                    <div class="element">
                        <b>Supplier Name : </b><?php echo $resinq[0]['supplier_firm_name']; ?>
                    </div>
                     <table>
                    <thead>
                        <tr>
                            <th scope="col">POD_ID</th> 
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($a=0; $a<count($respo); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $respo[$a]['pod_id']; ?></td>
                            <td><?php echo $respo[$a]['product_name']; ?></td>
                            <td><?php echo $respo[$a]['product_quantity']; ?></td>
                            <td><?php echo $respo[$a]['product_rate']; ?></td>
                            <td class="align-center"><?php if($respo[$a]['status']==0){echo "<span style='color:red;'><b>Pending</b></span>";}elseif($respo[$a]['status']!=0){echo "<span style='color:#00AF00;'><b>Received</b></span>";}?></td>
                            <td>
                                <a class="button" href="#">Received</a>
                            </td>
                        </tr> 
                        <?php } ?> 
                    </tbody>
                </table>
                    <div class="element">
                        <b>Amount : </b><?php echo $res_inq[0]['amount']; ?>
                    </div>
                    <div class="element">
                        <b>Tax : </b><?php echo $res_inq[0]['tax']; ?>
                    </div>
                    <div class="element">
                        <b>Total : </b><?php echo $res_inq[0]['total']; ?>
                    </div>
                    <div class="element">
                        <b>Status : </b><?php if($res_inq[0]['status']==1){echo "<span style='color:red;'><b>Pending</b></span>";}elseif($res_inq[0]['status']==2){echo "<span style='color:#00AF00;'><b>Samples Sent</b></span>";} elseif($res_inq[0]['status']==3){echo "<span style='color:#00FF00;'><b>Order Received</b></span>";}?>
                    </div>
                    <div class="entry">
                        <a class="button" href="po_master.php?act=cancel&id=<?php echo $res_inq[0]['p_id']; ?>">Cancel Purchase Order</a>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>