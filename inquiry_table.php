<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/inquiryclass.php');
//  include('classes/categoryclass.php');
  
 // $OBJ_CAT = new CATEGORY();
  $OBJ_INQ = new INQUIRY();
  $res_inq = $OBJ_INQ->GetInquiry();
  
 // $res_catname = $OBJ_INQ->GetProCat();
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Inquiry Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Project_ID</th>                            
                            <th scope="col">Customer</th>
                            <th scope="col">Product</th>                               
                            <th scope="col">Requirement</th>
                            <th scope="col">Quantity</th>                              
                            <th scope="col">Inq_Date</th>
                            <th scope="col">P_Status</th>                              
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>                                                       
                    <tbody>
                    <?php for($a=0; $a<count($res_inq); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $res_inq[$a]['p_id']; ?></td>
                            <td><?php echo $res_inq[$a]['cname']; ?></td>
                            <td><?php echo $res_inq[$a]['category_name']; ?></td>
                            <td><?php echo $res_inq[$a]['preq']; ?></td>
                            <td><?php echo $res_inq[$a]['quant']; ?></td>
                            <td><?php echo $res_inq[$a]['inq_date']; ?></td>
                           <td class="align-center"><?php if($res_inq[$a]['status']==1){echo "<span style='color:red;'><b>Pending</b></span>";}elseif($res_inq[$a]['status']==2){echo "<span style='color:#00AF00;'><b>Samples Sent</b></span>";} elseif($res_inq[$a]['status']==3){echo "<span style='color:#00FF00;'><b>Order Received</b></span>";}?></td> 
                            <td>
                                <a href="view_inquiry.php?act=view&id=<?php echo $res_inq[$a]['p_id']; ?>" class="table-icon view" title="View"></a>
                                <a href="inquirypage.php?act=edit&id=<?php echo $res_inq[$a]['p_id']; ?>" class="table-icon edit" title="Edit"></a>
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
                    <a class="button add" href="inquirypage.php">Add new Project</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

<?php 
include('footer.php');
?>