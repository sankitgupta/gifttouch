<?php
  include('header.php');
  include('sidemenu.php'); 
?>
<div id="main">
            <div class="full_w">
                <div class="h_title">Bill Details</div>
                <form action="" method="post">
                    <div class="element">
                        <label for="name">Bill ID<span class="red">(required)</span></label>
                        <input id="name" name="name" class="text" />
                    </div>
                    <div class="element">
                        <label for="name">Product ID<span class="red">(required)</span></label>
                        <input id="name" name="name" class="text" />
                    </div>
                    <div class="element">
                        <label for="name">Quantity<span class="red">(required)</span></label>
                        <input id="name" name="name" class="text" />
                    </div>
                    <div class="element">
                        <label for="name">Rate<span class="red">(required)</span></label>
                        <input id="name" name="name" class="text" />
                    </div>
                    <div class="entry">
                         <button type="submit" class="add">Add</button> <button class="cancel">Reset</button>
                    </div>
                </form>
            </div>
           
</div>
<div class="clear"></div>
</div>
<?php 
include('footer.php');
?>