<?php
  class PRODUCT extends MYSQLCN
  {                
      public $pid;
      public $pname;
      public $pcat;
      public $pdesc;
      public $image;
      public $pquant;
      public $prate;
      public $status;
      public $createdon;
      
      function AddProduct()
      {
            $sql = "INSERT INTO product_master VALUES(NULL,'".$this->pname."','".$this->pcat."','".$this->image."','".$this->pdesc."','".$this->pquant."','".$this->prate."','".$this->status."',NOW())";
            $this->insert($sql);
      }
      
      function GetProduct()
     {
         $sql = "SELECT * FROM product_master";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetProName()
     {
         $sql = "SELECT * FROM product_master WHERE product_name = '".$this->pname."' LIMIT 1";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function CatPro()
     {
         $sql = "SELECT product_name FROM product_master WHERE category_name = '".$this->pcat."' LIMIT 1";
         $result = $this->select($sql);
         return $result;
     }
     
     function GetPro()
     {
         $sql = "SELECT * FROM product_master WHERE product_id = ".$this->pid;
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetCat()
     {
         $sql = "SELECT * FROM category_master WHERE category_id = ".$this->pcat;
         $result = $this->select($sql);
         
         return $result;
     }
         
    function GetProductCat()
     {
         $sql = "SELECT prm.*,cm.category_name FROM product_master prm LEFT JOIN category_master cm ON prm.category_name = cm.category_id";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function EditPro()
     {
         $sql = "UPDATE product_master SET product_name = '".$this->pname."',category_name = '".$this->pcat."',product_image = '".$this->image."',product_description = '".$this->pdesc."',product_quantity = '".$this->pquant."',Rate = '".$this->prate."',Status = '".$this->status."' WHERE product_id =".$this->pid;
         $this->edit($sql);
      
         $this->insert($sql1);
     }
     
     function AddInventory()
     {
         $sql = "UPDATE product_master SET product_quantity = '".$this->pquant."' WHERE product_id = ".$this->pid;
         $this->edit($sql);
     }
     
  }
?>
