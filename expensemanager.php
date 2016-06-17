<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/expenseclass.php');
  
  $OBJ_EXPENSE = new EXPENSE();
  $expeid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='edit')
  {
      $OBJ_EXPENSE->expid = $expeid;
      $res_exp = $OBJ_EXPENSE->GetModExp();
  }
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Expense Manager</div>
                <?php
  if(isset($_POST['add']) && $_POST['add']=='submit')
  {
      extract($_POST);
      $OBJ_EXPENSE->etitle = $etitle;
      $resname = $OBJ_EXPENSE->GetExpName();
      
      if($_POST['etitle']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Expense title cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['edesc']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Expense description cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['eamt']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Expense amount cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^\d*\.?\d*$/i", $eamt))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid amount. Please enter only numerics.</p></div>        
      <?php
      }
      elseif($_POST['edate']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Enter a valid date.</p></div>
      <?php
      }
      
      else
      {
          $OBJ_EXPENSE->etitle = $_POST['etitle'];
          $OBJ_EXPENSE->edesc = $_POST['edesc'];
          $OBJ_EXPENSE->edate = $_POST['edate'];
          $OBJ_EXPENSE->eamt = $_POST['eamt'];
          
         if($action == "edit")
          {
              $OBJ_EXPENSE->expid = $_POST['expid'];
              $OBJ_EXPENSE->EditExp();
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
          }
          else
          {   
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_EXPENSE->AddExp();    
          }
          ?>
          <div class="n_ok"><p>Success notification. The expense has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'expensemanager.php'}, 1000) </script>";    
      }
      
  }
?>
                <form action="" method="post">
                <div class="element">
                        <label for="name">Title <span class="red">(required)</span></label>
                        <input id="name" name="etitle" class="text" value="<?php if(isset($etitle)){echo $etitle;}else{echo $res_exp[0]['exp_title'];} ?>" />
                    </div>
                <div class="element">
                        <label for="content">Description<span class="red">(required)</span></label>
                        <textarea name="edesc" class="textarea" rows="7"><?php if(isset($edesc)){echo $edesc;}else{echo $res_exp[0]['exp_description'];} ?></textarea>
                    </div>
                
                    <div class="element">
                        <label for="date">Date <span class="red">(required)</span></label>
                        <input name="edate" class="" type="date" value="<?php if(isset($edate)){echo $edate;}else{echo $res_exp[0]['exp_date'];} ?>"/>
                    </div>
                        <div class="element">
                        <label for="name">Amount <span class="red">(required)</span></label>
                        <input id="name" name="eamt" class="text" value="<?php if(isset($amount)){echo $amount;}else{echo $res_exp[0]['exp_amount'];} ?>" />
                    </div>
                    <input type="hidden" name="expid" value="<?php echo $res_exp[0]['exp_id']; ?>">
                    <div class="entry">
                    
                        <button type="submit" class="add" name="add" value="submit">Add Expense</button> <button class="cancel">Cancel</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>