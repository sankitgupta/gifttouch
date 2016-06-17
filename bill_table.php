<?php
  include('header.php');
  include('sidemenu.php');
?>
<div id="main">

<div class="full_w">
                <div class="h_title">Invoice Master</div>
                <h2>Gift Touch</h2>
                         <p>Welcome, customer satisfaction and efficient relation is our motto.</p>
                
                <div class="entry">
                    <div class="sep"></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Invoice_ID</th>
                            
                            <th scope="col">Customer</th>
                            
                            
                            <th scope="col">Product</th>
                            <th scope="col">Amount</th>
                            
                            <th scope="col">Invoice_Date</th>
                            <th scope="col">Status</th>
                            
                            <th scope="col" style="width: 65px;">Modify</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <tr>
                            <td class="align-center">2</td>
                            <td>Home</td>
                            <td>Paweł B.</td>
                            <td>22-03-2012</td>
                           
                            <td>-</td>
                            <td>-</td>

                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-center">3</td>
                            <td>Our offer</td>
                            <td>Paweł B.</td>
                            <td>22-03-2012</td>
                            
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
                            
                        <tr>
                            <td class="align-center">5</td>
                            <td>About</td>
                            <td>Admin</td>
                            <td>23-03-2012</td>
                            
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
                            
                        <tr>
                            <td class="align-center">12</td>
                            <td>Contact</td>
                            <td>Admin</td>
                            <td>25-03-2012</td>
                            <td>-</td>
                            <td>-</td>
                            
                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>                        
                        <tr>
                            <td class="align-center">114</td>
                            <td>Portfolio</td>
                            <td>Paweł B.</td>
                            <td>22-03-2012</td>
                            <td>-</td>
                            <td>-</td>
                            
                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
                            
                        <tr>
                            <td class="align-center">116</td>
                            <td>Clients</td>
                            <td>Admin</td>
                            <td>23-03-2012</td>
                            
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
                            
                        <tr>
                            <td class="align-center">131</td>
                            <td>Customer reviews</td>
                            <td>Admin</td>
                            <td>25-03-2012</td>
                            
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="#" class="table-icon edit" title="Edit"></a>
                                <a href="#" class="table-icon archive" title="Archive"></a>
                                <a href="#" class="table-icon delete" title="Delete"></a>
                            </td>
                        </tr>
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
                    <a class="button add" href="bill_master.php">Add new entry</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>