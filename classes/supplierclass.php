<?php
  class SUPPLIER extends MYSQLCN
  {                
      public $cid;
      public $cname;
      public $caddress;
      public $cperson;
      public $cno;
      public $email;
      public $status;
      public $sdesc;
      public $createdon;
      
      function AddSupplier()
      {
            $sql = "INSERT INTO supplier_master VALUES(NULL,'".$this->cname."','".$this->cperson."','".$this->caddress."','".$this->cno."','".$this->email."','".$this->sdesc."','".$this->status."',NOW())";
            $this->insert($sql);
      }
      
      function GetModSupplier()
     {
         $sql = "SELECT * FROM supplier_master WHERE supplier_id = ".$this->cid;
         $result = $this->select($sql);
         
         return $result;
     }
     
      function GetSupplier()
     {
         $sql = "SELECT * FROM supplier_master";
         $result = $this->select($sql);
         
         return $result;
     }
     
     
     function EditSupplier()
     {
         $sql = "UPDATE supplier_master SET supplier_firm_name = '".$this->cname."',supplier_person_name = '".$this->cperson."',supplier_address = '".$this->caddress."',supplier_contact = '".$this->cno."',supplier_email = '".$this->email."',supplier_description = '".$this->sdesc."',supplier_status = '".$this->status."' WHERE supplier_id =".$this->cid;
         $this->edit($sql);
      
         $this->insert($sql1);
     }
     
     
  }
?>
