<?php
  class INQUIRY extends MYSQLCN
  {
      public $pid;
      public $cname;
      public $caddress;
      public $cperson;
      public $cno;
      public $email;
      public $pcat;
      public $preq;
      public $quant;
      public $budget;
      public $inq_date;
      public $status;
      public $createdon;
      
      function AddInq()
      {
            $sql = "INSERT INTO project_manager VALUES(NULL,'".$this->cname."','".$this->caddress."','".$this->cperson."','".$this->cno."','".$this->email."','".$this->pcat."','".$this->preq."','".$this->quant."','".$this->budget."','".$this->inq_date."','".$this->status."',NOW())";
            $this->insert($sql);
      }
      
      function GetInquiry()
     {
         $sql = "SELECT prm.*,cm.category_name FROM project_manager prm LEFT JOIN category_master cm ON prm.pcat = cm.category_id";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetModInq()
     {
         $sql = "SELECT * FROM project_manager WHERE p_id = ".$this->pid;
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function EditInq()
     {
         $sql = "UPDATE project_manager SET cname = '".$this->cname."',caddress = '".$this->caddress."',cperson = '".$this->cperson."',cno = '".$this->cno."',email = '".$this->email."',pcat = '".$this->pcat."',status = '".$this->status."',inq_date = '".$this->inq_date."',budget = '".$this->budget."',preq = '".$this->preq."',quant = '".$this->quant."' WHERE p_id =".$this->pid;
         $this->edit($sql);
      
         $this->insert($sql1);
     }
     
     
    /* function GetProCat()
     {
         $sql = "SELECT category_name FROM category_master WHERE category_id = ".$this->pcat;
         $result = $this->select($sql);
         
         return $result;
     }*/
  }
?>
