<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/poclass.php');
  include('classes/supplierclass.php');
  $OBJ->SUPP = new SUPPLIER();
  $OBJ_PO = new PO();
  $respo = $OBJ_PO->GetPOD();
  $respos = $OBJ_PO->GetPOSupplier();
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Purchase Order Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">PO_ID</th>                            
                            <th scope="col">Supplier</th>
                            <th scope="col">Amount</th>
                            <th scope="col">PO_Date</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($a=0; $a<count($respo); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $respo[$a]['payorder_id']; ?></td>
                            <td><?php echo $respos[$a]['supplier_firm_name']; ?></td>
                            <td><?php echo $respo[$a]['total']; ?></td>
                            <td><?php echo $respo[$a]['payorder_date']; ?></td>
                            <td class="align-center"><?php if($respo[$a]['status']==1){echo "<span style='color:red;'><b>Pending</b></span>";}elseif($respo[$a]['status']==2){echo "<span style='color:#00AF00;'><b>Partially Received</b></span>";} elseif($respo[$a]['status']==3){echo "<span style='color:#00FF00;'><b> Received</b></span>";}?></td>
                            <td>
                                <a href="view_po.php?act=view&id=<?php echo $respo[$a]['payorder_id'];?>" class="table-icon view" title="View"></a>
                                <a href="po_master.php?act=edit&id=<?php echo $respo[$a]['payorder_id'];?>" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr> 
                        <?php } ?> 
                    </tbody>
                </table>
                <div class="entry">
                    <div class="pagination">
                        <span>« First</span>
                        <span class="active">1</span>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a href="">4</a>
                        <span>...</span>
                        <a href="">23</a>
                        <a href="">24</a>
                        <a href="">Last »</a>
                    </div>
                    <div class="sep"></div>        
                    <a class="button add" href="po_master.php">Add new</a> 
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>


<?php 
include('footer.php');
?>