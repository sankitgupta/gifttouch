<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/categoryclass.php');
  include('classes/productclass.php');
  $OBJ_CAT = new CATEGORY();
  $OBJ_PRO = new PRODUCT();
  $proid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='view')
  {
      $OBJ_PRO->pid = $proid;
      $res_pro = $OBJ_PRO->GetPro();
      $OBJ_PRO->pcat = $res_pro[0]['category_name'];
      $resinq = $OBJ_PRO->GetCat();
  }
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Product Details</div>
                <form action="" method="post">
                    <div class="element">
                        <b>Product ID : </b><?php echo $res_pro[0]['product_id']; ?>
                    </div>
                    <div class="element">
                        <b>Product Name : </b><?php echo $res_pro[0]['product_name']; ?>
                    </div>
                    <div class="element">
                        <b>Category : </b><?php echo $resinq[0]['category_name']; ?>
                    </div>
                    <div class="element">
                        <b>Product Description : </b><?php echo $res_pro[0]['product_description']; ?>
                    </div>
                    <div class="element">
                        <b>Image : </b><img src="img/products/<?php echo $res_pro[0]['product_image']; ?>" alt="<?php echo $res_pro[0]['product_name']; ?>" width="150"/>
                    </div>
                    <div class="element">
                        <b>Quantity : </b><?php echo $res_pro[0]['product_quantity']; ?>
                    </div>
                    <div class="element">
                        <b>Rate : </b><?php echo $res_pro[0]['Rate']; ?>
                    </div>
                    <div class="element">
                        <b>Status : </b><?php if($res_pro[0]['Status']==1){echo "<span style='color:green;'><b>Active</b></span>";}elseif($res_pro[0]['Status']==2){echo "<span style='color:red;'><b>Blocked</b></span>";}?>
                    </div>
                    <div class="entry">
                        <a class="button" href="product_manager.php?act=edit&id=<?php echo $res_pro[0]['product_id']; ?>">Edit Product</a>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>
