<?php
  include('header.php');
  include('sidemenu.php');
  require_once('classes/poclass.php') ;
  require_once('classes/supplierclass.php');
  require_once('classes/productclass.php');
  $OBJ_PO = new PO();
  $OBJ_SUP = new SUPPLIER();
  $OBJ_PRO = new PRODUCT();
  $poid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='view')
  {
      $OBJ_PO->poid = $poid;
      $res_po = $OBJ_PO->GetModInq();
  }
  $res_pro = $OBJ_PRO->GetProduct();
  $res_sup = $OBJ_SUP->GetSupplier();
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Purchase Order  Master</div>
                <?php
                if(isset($_POST['add']) && $_POST['add']=='add')
                {
                    extract($_POST);
                    $OBJ_PO->pdate = $_POST['date'];
                    $OBJ_PO->sid = $_POST['supp'];
                    $OBJ_PO->amt = $_POST['amt'];
                    $OBJ_PO->tax = $_POST['tax'];
                    $OBJ_PO->total = $_POST['total'];
                    $OBJ_PO->status = $_POST['status'];
                    $addmore = $OBJ_PO->AddPO();    
                    $OBJ_PO->poid = $addmore;
                    $pod_amount = '0';
                    for($a=0; $a<count($prodid); $a++)
                    {
                        $OBJ_PO->proid = $_POST['prodid'][$a];
                        $OBJ_PO->qty = $_POST['prodqty'][$a];
                        $OBJ_PO->rate = $_POST['prodrate'][$a];
                        $pod_amount = $pod_amount + $_POST['prodqty'][$a]*$_POST['prodrate'][$a];
                        
                        $OBJ_PO->AddPOD();
                    }
                    $OBJ_PO->amt = $pod_amount;
                    $OBJ_PO->Update();
                     ?>
          <div class="n_ok"><p>Success notification. The purchase order has been successfully generated.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'po_master.php'}, 1000) </script>";    
?>
                <form action="" method="post">
                
                <div class="element">
                        <label for="date">Date <span class="red">(required)</span></label>
                        <input name="date" class="" type="date"/>
                </div>   
                <div class="element">
                        <label for="category">Supplier Name<span class="red">(required)</span></label>
                        <select name="supp" class="" >
                            <option value="0">-- SUPPLIER NAME --</option>
                            <?php for($a=0; $a<count($res_sup); $a++) { ?>
                            <option value="<?php echo $res_sup[$a]['supplier_id']; ?>"<?php if(isset($supp) && $supp==$res_sup[$a]['supplier_id']){echo "selected";} ?>><?php echo $res_sup[$a]['supplier_firm_name']; ?></option>
                            <?php } ?>
                        </select>
                </div>
                    <script type="text/Javascript">
                        function add_more(){
                        var res = $('#repeatpo').html();
                        $('#prods').append(res);
                        }
                    </script>
                    <label style="padding-top: 4px; padding-left: 12px;">Puchase Order Description</label>
                <div class="element" id="prods">
                        Product: <!--<INPUT style="margin-bottom: 5px;" type="text" SIZE="35" name="prodid[]">--><select name="prodid[]" class="">
                            <option value="0">---- Select product ----</option>
                            <?php for($a=0; $a<count($res_pro); $a++) { ?>
                            <option value="<?php echo $res_pro[$a]['product_id']; ?>"><?php echo $res_pro[$a]['product_name']; ?></option>
                            <?php } ?>
                        </select>
                        Qty: <INPUT style="margin-bottom: 5px;" type="text" SIZE="15" name="prodqty[]">
                        Rate: <INPUT style="margin-bottom: 5px;" type="text" SIZE="15" name="prodrate[]"> <br/> 
                </div>
                    <div class="element">                        
                               <a href="Javascript:;" onclick="add_more()"> Add Product</a>
                    </div>
                    <div class="element">
                        <label for="name">Tax Rate(%)<span class="red">(required)</span></label>
                        <input id="name" name="tax" class="text" />
                    </div>
                    <div class="element">
                        <label for="category">Status<span class="red">(required)</span></label>
                        <select name="status" class="" >
                            <option value="0">-- Status --</option>
                            <option value="1">Pending</option>
                            <option value="2">Partially received</option>
                            <option value="3">Received</option>
                        </select>
                    </div>
                    <input type="hidden" name="posid" value="<?php echo $res_inq[0]['p_id']; ?>">
                    <div class="entry">
                         <button type="submit" class="add" name="add" value="add">Add</button> <button class="cancel">Reset</button>
                    </div>
                </form>
            </div>
            <div style="display: none;" id="repeatpo">
                    Product: <!--<INPUT style="margin-bottom: 5px;" type="text" SIZE="35" name="prodid[]">--><select name="prodid[]" class="">
                            <option value="0">---- Select product ----</option>
                            <?php for($a=0; $a<count($res_pro); $a++) { ?>
                            <option value="<?php echo $res_pro[$a]['product_id']; ?>"><?php echo $res_pro[$a]['product_name']; ?></option>
                            <?php } ?>
                        </select>
                        Qty: <INPUT style="margin-bottom: 5px;" type="text" SIZE="15" name="prodqty[]"/>
                        Rate: <INPUT style="margin-bottom: 5px;" type="text" SIZE="15" name="prodrate[]"/> <br/>
            </div>          
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>