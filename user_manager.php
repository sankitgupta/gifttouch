<?php
  include('header.php');
  include('sidemenu.php'); 
  include('classes/admin.class.php');
  
  $OBJ_USER = new USER();
  
  $userid = $_GET['id'];
  $action = $_GET['act'];
  if(isset($_GET['id']) && $_GET['id']!='' && $_GET['id']!=0 && $_GET['act']=='edit')
  {
      $OBJ_USER->uid = $userid;
      $res_user = $OBJ_USER->GetAdmin();
  }
  
?>

<div id="main">
            <div class="full_w">
                <div class="h_title">User Manager</div>
                <?php
  if(isset($_POST['add']) && $_POST['add']=='add')
  {
      extract($_POST);
      $OBJ_USER->uname = $uname;
      $resname = $OBJ_USER->GetUserName();
      
      if($_POST['uname']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. Username cannot be empty.</p></div>
      <?php
      }
      elseif(!empty($resname) && $_POST['uname']!=$_POST['huname'])
      {   ?>
          <div class="n_error"><p>Error notification. This username exists, please try a different username.</p></div>        
          <?php 
      }
      elseif($_POST['umail']=='')
      { ?>
          <div class="n_warning"><p>Attention notification. E-mail cannot be empty.</p></div>
      <?php
      }
      elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $umail))
      {  ?>
          <div class="n_error"><p>Error notification. This is an invalid e-mail address.</p></div>        
      <?php
      }
      elseif($_POST['upswd']=='')
      {  ?>
          <div class="n_warning"><p>Attention notification. Password cannot be empty.</p></div>
      <?php
      }
      elseif($_POST['status']=='0')
      {  ?>
          <div class="n_warning"><p>Attention notification. Please select status.</p></div>
      <?php
      }
      else     
      {
          $OBJ_USER->uname = $_POST['uname'];
          $OBJ_USER->upswd = $_POST['upswd'];
          $OBJ_USER->umail = $_POST['umail'];
          $OBJ_USER->status = $_POST['status'];
          
          if($action == "edit")
          {
             // echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_USER->uid = $_POST['uid'];
              $OBJ_USER->EditAdmin();
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
          }
          else
          {   
              //echo "<script>alert('lol..!! I am in add function.!');</script>";
              $OBJ_USER->AddUser();    
          }  
          ?>
          <div class="n_ok"><p>Success notification. The user has been successfully added.</p></div>
        <?php  echo $msg = "<script type='text/javascript'> setTimeout(function(){ window.location.href = 'user_manager.php'}, 2000) </script>";    
      }
      
  }
?>
                <form action="" method="post">
                    <div class="element">
                        <label for="name">Name<span class="red">(required)</span></label>
                        <input id="name" name="uname" class="text" value="<?php if(isset($uname)){echo $uname;}else{echo $res_user[0]['user_name'];}  ?>"/>
                        <input type="hidden" name="huname" value="<?php echo $res_user[0]['user_name']; ?>" />
                    </div>
                      <div class="element">
                        <label for="name">Email<span class="red">(required)</span></label>
                        <input id="name" name="umail" class="text" value="<?php if(isset($umail)){echo $umail;}else{echo $res_user[0]['user_email'];} ?>"/>
                    </div>
                     <div class="element">
                        <label for="name">Password<span class="red">(required)</span></label>
                        <input id="name" name="upswd" class="text" type="password" value="" />
                    </div>
                    <div class="element">
                        <label for="category">Status<span class="red">(required)</span></label>
                        <select name="status" >
                            <option value="0">-- select status --</option>
                            <option value="1" <?php if(isset($status) && $status=="1"){echo "selected";}elseif($res_user[0]['user_status']=='1'){echo "selected";} ?>>Active</option>
                            <option value="2" <?php if(isset($status) && $status=="2"){echo "selected";}elseif($res_user[0]['user_status']=='2'){echo "selected";} ?>>Blocked</option>
                            
                        </select>
                    </div>
                    <input type="hidden" name="uid" value="<?php echo $res_user[0]['user_id']; ?>">
                    <div class="entry"> 
                            
                            <button type="submit" class="add" name="add" value="add">Add User</button> <button class="cancel">Cancel</button>
                    </div>
                    
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>