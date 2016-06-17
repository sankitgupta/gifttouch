<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/productclass.php') ;
  $OBJ_PRO = new PRODUCT();
  $respro = $OBJ_PRO->GetProduct();
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Inventory Manager</div>
                
                 <?php
  //$proid = $_GET['id'];
  //$action = $_GET['act'];
  if(isset($_POST['do']) && $_POST['do']=='add')
  {
    extract($_POST);
    $OBJ_PRO->pid=$pro;
      if($_POST['pro']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Please select product.</p></div>
      <?php
      }
      elseif($_POST['quant']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Product quantity cannot be empty.</p></div>
      <?php
      }
      else
      {
        $res_pro = $OBJ_PRO->GetPro();
        $final = $_POST['quant'] + $res_pro[0]['product_quantity'];
        $OBJ_PRO->pquant = $final;
        $OBJ_PRO->AddInventory();
?>
        <div class="n_ok"><p>Success notification. The data has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'add_inventory.php'}, 1000) </script>";    
      }
  }
?>
                <form action="" method="post">
                   <div class="element">
                        <label for="category">Product Name<span class="red">(required)</span></label>
                        <select name="pro" class="" >
                            <option value="">-- SELECT PRODUCT --</option>
                            <?php for($a=0; $a<count($respro); $a++) { ?>
                            <option value="<?php echo $respro[$a]['product_id']; ?>"<?php if(isset($pro) && $pro==$respro[$a]['product_id']){echo "selected";} ?>><?php echo $respro[$a]['product_name']; ?></option>
                            <?php } ?>
                        </select>
                   </div>
                    <div class="element">
                        <label for="name">Quantity<span class="red">(required)</span></label>
                        <input id="name" name="quant" class="text" value="<?php if(isset($quant)){echo $quant;} ?>"/>
                    </div>
                    <div class="entry">
                        <button type="submit" class="add" name="do" value="add">Add</button> <button class="cancel">Cancel</button>
                        <!--<a class="button" href="add_inventory.php?act=add&id=<?php echo $respro[0]['product_id']; ?>">Add Product</a>-->
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>