<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/customerclass.php');
  require_once('classes/productclass.php');
  $OBJ_PRO = new PRODUCT();
  $OBJ_CUST = new CUSTOMER();
  $res_pro = $OBJ_PRO->GetProduct();
  $res_cust = $OBJ_CUST->GetAllCust();
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Invoice Master</div>
                <form action="" method="post">
                <div class="element">
                        <label for="category">Customer Name <span class="red">(required)</span></label>
                        <select name="cname" class="" >
                            <option value="0">--------------SELECT CUSTOMER--------------</option>
                            <?php for($a=0; $a<count($res_cust); $a++) { ?>
                            <option value="<?php echo $res_cust[$a]['customer_id']; ?>" <?php if(isset($cname) && $cname=="$res_cust[$a]['customer_id'];"){echo "selected";} ?>><?php echo $res_cust[$a]['customer_company']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="element">
                        <label for="date">Date <span class="red">(required)</span></label>
                        <input name="inq_date" class="" type="date" value="<?php if(isset($inq_date)){echo $inq_date;} ?>"/>
                    </div>
                   <script type="text/Javascript">
                        function add_more(){
                        var res = $('#repeatpo').html();
                        $('#prods').append(res);
                        }
                    </script>
                    <label style="padding-top: 4px; padding-left: 12px;">Invoices Description</label>
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
                        <label for="name">Amount<span>(sum of all products)(calculated automatically)</span></label>
                        <input id="name" name="name" class="text" />
                    </div>
                    <div class="element">
                        <label for="name">Tax<span class="red">(required)</span></label>
                        <input id="name" name="name" class="text" />
                    </div>
                    <div class="entry">
                         <button type="submit" class="add">Add</button> <button class="cancel">Reset</button>
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
                        Qty: <INPUT style="margin-bottom: 5px;" type="text" SIZE="15" name="prodqty[]">
                        Rate: <INPUT style="margin-bottom: 5px;" type="text" SIZE="15" name="prodrate[]"> <br/>
                    </div>          

           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>