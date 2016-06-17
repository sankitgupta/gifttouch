<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/productclass.php');
  $OBJ_PRO = new PRODUCT();
  $respro = $OBJ_PRO->GetProductCat();
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Product Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                
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
                    <a class="button add" href="product_manager.php">Add new entry</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php 
include('footer.php');
?>