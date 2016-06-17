<?php
  class CUSTOMER extends MYSQLCN
  {
      public $customer_id;
      public $customer_company;
      public $customer_name;
      public $tin_no;
      public $customer_address;
      public $customer_contact;
      public $customer_email;
      public $customer_status;
      public $createdon;
      
      function AddCustomer()
      {
            $sql = "INSERT INTO customer_master VALUES(NULL,'".$this->customer_company."','".$this->customer_name."','".$this->tin_no."','".$this->customer_address."','".$this->customer_contact."','".$this->customer_email."','".$this->customer_status."',NOW())";
            $this->insert($sql);
      }
      
      function GetCustomer()
     {
         $sql = "SELECT * FROM customer_master WHERE customer_id = ".$this->customer_id;
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function GetAllCust()
     {
         $sql = "SELECT * FROM customer_master";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function EditCust()
     {
         $sql = "UPDATE customer_master SET customer_name = '".$this->customer_name."',customer_company = '".$this->customer_company."',customer_address = '".$this->customer_address."',tin_no = '".$this->tin_no."',customer_email = '".$this->customer_email."',customer_contact = '".$this->customer_contact."',customer_status = '".$this->customer_status."' WHERE customer_id =".$this->customer_id;
         $this->edit($sql);
      
         $this->insert($sql1);
     }
     
  }
?>
