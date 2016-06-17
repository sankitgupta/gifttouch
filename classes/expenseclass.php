<?php
  class EXPENSE extends MYSQLCN
  {
      public $expid;
      public $etitle;
      public $edesc;
      public $edate;
      public $eamt;
      public $createdon;
      
      function AddExp()
      {
            $sql = "INSERT INTO expense_manager VALUES(NULL,'".$this->etitle."','".$this->edesc."','".$this->edate."','".$this->eamt."',NOW())";
            $this->insert($sql);
      }
      
      function GetExpName()
     {
         $sql = "SELECT * FROM expense_manager";
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function GetModExp()
     {
         $sql = "SELECT * FROM expense_manager WHERE exp_id = ".$this->expid;
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function EditExp()
     {
         $sql = "UPDATE expense_manager SET exp_title = '".$this->etitle."',exp_description = '".$this->edesc."',exp_date = '".$this->edate."',exp_amount = '".$this->eamt."' WHERE exp_id =".$this->expid;
         $this->edit($sql);
      
         $this->insert($sql1);
     }
     
     
  }
  
?>
