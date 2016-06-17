<?php
  include('header.php');
  include('sidemenu.php');
  include('classes/expenseclass.php');
  $OBJ_EXP = new EXPENSE();
  $resexp = $OBJ_EXP->GetExpName();
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Expense MAnager</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Expense_ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>                             
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                    <tbody>   
                                         <?php for($a=0; $a<count($resexp); $a++) { ?>
                        <tr>
                            <td class="align-center"><?php echo $resexp[$a]['exp_id']; ?></td>
                            <td><?php echo $resexp[$a]['exp_title']; ?></td>
                            <td><?php echo $resexp[$a]['exp_description']; ?></td>
                            <td><?php echo $resexp[$a]['exp_amount']; ?></td>
                            <td><?php echo $resexp[$a]['exp_date']; ?></td>
                            <td>
                                <a href="#" class="table-icon view" title="View"></a>
                                <a href="expensemanager.php?act=edit&id=<?php echo $resexp[$a]['exp_id']; ?>" class="table-icon edit" title="Edit"></a>
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
                    <a class="button add" href="expensemanager.php">Add new expense</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

<?php 
include('footer.php');
?>
