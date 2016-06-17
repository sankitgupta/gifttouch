<?php 
includes('header.php');
require_once('class/product.class.php');

$OBJ_PROD = new PRODUCTS();
$OBJ_PROD->prodID = $_GET['id'];
$res_prods = $OBJ_PROD->GetProduct();

?>
<form action="" method="POST" >
// for textbox
<input type="text" name="pname" value="<?php if(isset($pname)){echo $pname;} ?>">

//for textarea
<textarea name="pdesc"><?php if(isset($pdesc)){echo $pdesc;} ?></textarea>

//for dropdown
<select name="pcategory">
	<option value="Electronics" <?php if(isset($pcategory) && $pcategory=="Electronics"){echo "selected";} ?> ></option>
	<option value="Furnitute" <?php if(isset($pcategory) && $pcategory=="Furniture"){echo "selected";} ?>></option>
	<option value="Clothes" <?php if(isset($pcategory) && $pcategory=="Clothes"){echo "selected";} ?>></option>
</select>

//for radio (same for checkbox)
<input type="radio" name="pstatus" value="1" <?php if(isset($pstatus) && $pstatus==1){echo "checked";} ?> /> Active
<input type="radio" name="pstatus" value="0" <?php if(isset($pstatus) && $pstatus==0){echo "checked";} ?> /> Blocked

</form>

<?php 
require_once('footer.php');
?>