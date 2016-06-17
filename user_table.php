<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/admin.class.php');
  
  $OBJ_USER = new USER();
  $res_user = $OBJ_USER->GetAllUser();
?>
<div id="main">

<div class="full_w">
                <div class="h_title">User Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">User_ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                    <?php for($a=0; $a<count($res_user); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $res_user[$a]['user_id']; ?></td>
                            <td><?php echo $res_user[$a]['user_name']; ?></td>
                            <td><?php echo $res_user[$a]['user_email']; ?></td>
                            <td><?php if($res_user[$a]['user_status']==1){echo "<span style='color:#00AF00;'><b>Active</b></span>";}else{echo "<span style='color:red;'><b>Blocked</b></span>";} ?></td>
                            <td>
                                <a href="#" class="table-icon view" title="View"></a>
                                <a href="user_manager.php?act=edit&id=<?php echo $res_user[$a]['user_id']; ?>" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="entry">
                    
                    <div class="sep"></div>        
                    <a class="button add" href="user_manager.php">Add new user</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>


<?php 
include('footer.php');
?>