<?php
 
 class USER extends MySQLCN
 {
     public $uid;
     public $uname;
     public $upswd;
     public $umail;
     public $status;
     public $createdon;
     
     function AddUser()
     {
         $sql = "INSERT INTO user_master VALUES(NULL,'".$this->uname."','".$this->upswd."','".$this->umail."','".$this->status."',NOW())";
         //  die('lol');
         $this->insert($sql);
     }
     
     function GetUserName()
     {
         $sql = "SELECT * FROM user_master WHERE user_name = '".$this->uname."' LIMIT 1";
         $result = $this->select($sql);
         
         return $result;
     } 
     
     function GetAllUser()
     {
         $sql = "SELECT * FROM user_master";
         $result = $this->select($sql);
         
         return $result;
     }
     
     function GetAdmin()
     {
         $sql = "SELECT * FROM user_master WHERE user_id = ".$this->uid;
         $result = $this->select($sql);
         
         return $result;
     }
     
     function DelAdmin()
     {
         $sql = "DELETE FROM admin WHERE AdminID = ".$this->adminid;
         mysql_query($sql);
         
        
         
     }
     
     function EditAdmin()
     {
         //echo "<script>alert('lol..!! I am in class.!');</script>";
         $sql = "UPDATE user_master SET user_name = '".$this->uname."',user_email = '".$this->umail."',user_pswd = '".$this->upswd."',user_status = '".$this->status."' WHERE user_id =".$this->uid;
         $this->edit($sql);
         
         //$sql1 = "INSERT INTO admin_log VALUES(NULL,'".$_SESSION['adminid']."','".$_SESSION['login_user']."','Admin Module','Updated User',NOW(),'".$this->uname."')";
         //$this->insert($sql1);
     }
     
     function AdminLogin()
     {
         $sql = "SELECT * FROM admin WHERE Username = '".$this->uname."' AND Password = '".$this->pwd."' LIMIT 1";
         $resul=   $this->select($sql);
         
         return $resul;
     }
     
 }
 
 
  
?>
