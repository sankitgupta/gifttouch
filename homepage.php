<?php
   include('header.php');
  include('sidemenu.php');
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Gift Touch</div>
                <h2>Our Aim</h2>
                         <p style="font: serif; font-size: 15px;">Gift Touch started their operations in year 1991. We are among the leading suppliers of corporate gifts and promotional items. We have been delivering great values to our customers through our efficient sourcing and manufacturing process.</p>
                <div class="h_title">Our Products</div>
                <h2>Our Aim</h2>
                         <p style="font: serif; font-size: 15px;">Gift Touch started their operations in year 1991. We are among the leading suppliers of corporate gifts and promotional items. We have been delivering great values to our customers through our efficient sourcing and manufacturing process.</p>
                </div>
                </div>
                <!-- 
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Product_ID</th>                                                  
                            <th scope="col">Image</th>                                                  
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Rate</th> 
                            <th scope="col">Status</th>                           
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                                            <?php for($a=0; $a<count($respro); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $respro[$a]['product_id']; ?></td>
                            <td><img src="img/products/<?php echo $respro[$a]['product_image']; ?>" alt="<?php echo $respro[$a]['product_name']; ?>" width="80"/></td>
                            <td><?php echo $respro[$a]['product_name']; ?></td>
                            <td><?php echo $respro[$a]['category_name']; ?></td>
                            <td><?php echo $respro[$a]['product_quantity']; ?></td>
                            <td><?php echo $respro[$a]['Rate']; ?></td> 
                            <td class="align-center"><?php if($respro[$a]['Status']==1){echo "<span style='color:#00AF00;'><b>Active</b></span>";}else{echo "<span style='color:red;'><b>Blocked</b></span>";} ?></td> 
                            <td>
                                <a href="view_product.php?act=view&id=<?php echo $respro[$a]['product_id']; ?>" class="table-icon view" title="View"></a>
                                <a href="product_manager.php?act=edit&id=<?php echo $respro[$a]['product_id']; ?>" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr> 
                        <?php } ?> 
</tbody>
                </table> --> 
                
                    
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php 
include('footer.php');
?>