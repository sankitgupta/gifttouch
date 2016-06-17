<?php
  class CATEGORY extends MYSQLCN
  {
      public $catid;
      public $catname;
      public $createdon;
      
      function AddCategory()
      {
            $sql = "INSERT INTO category_master VALUES(NULL,'".$this->catname."',NOW())";
            $this->insert($sql);
      }
      
      function GetAllCategory()
     {
         $sql = "SELECT * FROM category_master";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetCatName()
     {
         $sql = "SELECT * FROM category_master WHERE category_name = '".$this->catname."' LIMIT 1";
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function GetName()
     {
         $sql = "SELECT category_name FROM category_master WHERE category_id = ".$this->catid;
         $result = $this->select($sql);
         
         return $result;
     }     
  }
?>
