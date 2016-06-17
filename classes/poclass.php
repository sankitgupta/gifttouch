<?php
  class PO extends MYSQLCN
  {
      public $poid;
      public $pdate;
      public $podid;
      public $proid;
      public $rate;
      public $qty;
      public $sid;
      public $amt;
      public $tax;
      public $total;
      public $status;
      public $createdon;
      public $podstatus;
      
      function GetPOD()
     {
         $sql = "SELECT prm.*,cm.supplier_firm_name FROM payorder_master prm LEFT JOIN supplier_master cm ON prm.supplier_id = cm.supplier_firm_name";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetPOSupplier()
     {
         $sql = "SELECT prm.*,cm.supplier_firm_name FROM payorder_master prm LEFT JOIN supplier_master cm ON prm.supplier_id = cm.supplier_id";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetPOPro()
     {
         $sql = "SELECT prm.*,cm.product_name FROM payorder_description prm LEFT JOIN product_master cm ON prm.product_id = cm.product_id";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function POSup()
     {
         $sql = "SELECT * FROM supplier_master WHERE supplier_id=".$this->sid;
         $result = $this->select($sql);
         return $result;
     }
     
     function GetPODescription()
     {
         $sql = "SELECT prm.*,cm.product_name FROM payorder_description prm LEFT JOIN product_master cm ON prm.product_id = cm.product_id WHERE prm.payorder_id =".$this->poid;
         $result = $this->select($sql);
         
         return $result;
     }
     
      function AddPO()
      {
            $sql = "INSERT INTO payorder_master VALUES(NULL,'".$this->pdate."','".$this->sid."','0','0','0','".$this->status."',NOW())";
            $this->insert($sql);
            
            $addmore = mysql_insert_id();
            return $addmore;
            
      }
      
      function GetPO()
     {
         $sql = "SELECT * FROM payorder_master";
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function AddPOD()
      {
            $this->total = $this->qty*$this->rate;
            $sql = "INSERT INTO payorder_description VALUES(NULL,'".$this->poid."','".$this->proid."','".$this->qty."','".$this->rate."','".$this->total."','0',NOW())";
            $this->insert($sql);
            
       }
       
       function GetModPo()
     {
         $sql = "SELECT * FROM payorder_master WHERE payorder_id = ".$this->poid;
         $result = $this->select($sql);
         
         return $result;
     } 
     
       
       function Update()
      {
            $this->tax = $this->amt*$this->tax/100;
            $this->total = $this->amt + $this->tax;
            $sql = "UPDATE payorder_master SET amount='".$this->amt."', total='".$this->total."',tax='".$this->tax."' WHERE payorder_id = ".$this->poid;
            $this->edit($sql);
      } 
     
  }
  
?>
