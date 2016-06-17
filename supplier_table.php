<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/supplierclass.php');
  
  $OBJ_SUP = new SUPPLIER();
  $res_sup = $OBJ_SUP->GetSupplier();
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Supplier Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Sup_ID</th>
                            <th scope="col">Sup_Name</th>
                            <th scope="col">Sup_Person</th>
                            <th scope="col">Contact</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <?php for($a=0; $a<count($res_sup); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $res_sup[$a]['supplier_id']; ?></td>
                            <td><?php echo $res_sup[$a]['supplier_firm_name']; ?></td>
                            <td><?php echo $res_sup[$a]['supplier_person_name']; ?></td>
                            <td><?php echo $res_sup[$a]['supplier_contact']; ?></td>
                            <td><?php echo $res_sup[$a]['supplier_email']; ?></td>
                            <td class="align-center"><?php if($res_sup[$a]['supplier_status']==1){echo "<span style='color:#00AF00;'><b>Active</b></span>";}else{echo "<span style='color:red;'><b>Blocked</b></span>";} ?></td> 
                            <td>
                                <a href="view_supplier.php?act=view&id=<?php echo $res_sup[$a][supplier_id]; ?>" class="table-icon view" title="View"></a>
                                <a href="suppliermaster.php?act=edit&id=<?php echo $res_sup[$a]['supplier_id']; ?>" class="table-icon edit" title="Edit"></a>
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
                    <a class="button add" href="suppliermaster.php">Add new Supplier</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>


<?php 
include('footer.php');
?>