<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/customerclass.php');
  
  $OBJ_CUST = new CUSTOMER();
  $res_cust = $OBJ_CUST->GetAllCust();
?>
<div id="main">
<div class="full_w">
                <div class="h_title">Customer Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Tin no.</th>
                            <th scope="col"> Contact </th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php for($a=0; $a<count($res_cust); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $res_cust[$a]['customer_id']; ?></td>
                            <td><?php echo $res_cust[$a]['customer_company']; ?></td>
                            <td><?php echo $res_cust[$a]['customer_name']; ?></td>
                            <td><?php echo $res_cust[$a]['tin_no']; ?></td>
                            <td><?php echo $res_cust[$a]['customer_contact']; ?></td> 
                            <td class="align-center"><?php if($res_cust[$a]['customer_status']==1){echo "<span style='color:#00AF00;'><b>Active</b></span>";}else{echo "<span style='color:red;'><b>Blocked</b></span>";} ?></td> 
                            <td>
                                <a href="view_customer.php?act=view&id=<?php echo $res_cust[$a]['customer_id']; ?>" class="table-icon view" title="View"></a>
                                <a href="customermanager.php?act=edit&id=<?php echo $res_cust[$a]['customer_id']; ?>" class="table-icon edit" title="Edit"></a>
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
                    <a class="button add" href="customermanager.php">Add new customer</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

<?php 
include('footer.php');
?>