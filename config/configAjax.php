<?php  
session_start();  
error_reporting(E_ALL & ~E_NOTICE); 

require_once('../classes/dbclass.php');  
                                      

define(TECH_PATH,"http://project.isnsoftech.com/Gift-touch/");

//if(!isset($_SESSION['order']))
 //   $_SESSION['order'] = array();
    
//ini_set("error_reporting",E_ALL); //Error Reporting
    
    
	putenv("TZ=GMT");
	$IP = $_SERVER['HTTP_HOST'];
 	if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='localhost:8080')
	{	
     //    die("dbdbdb");
		define ("DB_SERVER","localhost");
		define ("DB_DATABASE","gift_touch_db");
		define ("DB_USERNAME","root");
		define ("DB_PASSWORD","");
		$AbsoluteURL="http://127.0.0.1/Gift-touch/";
		$AbsoluteURLS="http://127.0.0.1/Gift-touch/";
		$AbsoluteAdminURLS="http://127.0.0.1/Gift-touch/";
	//	define ("SERVER_ROOT","http://192.168.1.114/breakfast/");
		//define("MAIL_TEMPLATE_PATH","http://localhost/shoping/mailtemplate/");
		
		define ("EMAIL_FROM","info@skydel.com");
		define ("EMAIL_TO","info@skydel.com");
		define ("EMAIL_FROM_NAME","");
	//	$BasicHURL=str_replace('index.php','',$_SERVER['PHP_SELF']);
	//	$HURL="http://".$_SERVER['HTTP_HOST'].$BasicHURL;
//		$HURLS="http://".$_SERVER['HTTP_HOST'].$BasicHURL;
	
	} else {
        
             /*
        define ("DB_SERVER","localhost");
        define ("DB_DATABASE","isn_100tech");
        define ("DB_USERNAME","isn_100tech");
        define ("DB_PASSWORD","isn_100tech");
        $AbsoluteURL="http://192.168.1.6:8080/100tech/";
        $AbsoluteURLS="http://192.168.1.6:8080/100tech/";
        $AbsoluteAdminURLS="http://192.168.1.6:8080/100tech/";
        */
        define ("DB_SERVER","192.168.1.6");
        define ("DB_DATABASE","Gift-touch");
        define ("DB_USERNAME","root");
        define ("DB_PASSWORD","");
        /*
		$AbsoluteURL= BFAST_PATH;
		$AbsoluteURLS= BFAST_PATH;
		define ("SERVER_ROOT",BFAST_PATH);
		define("MAIL_TEMPLATE_PATH","http://clients.redesignbox.com/breakfast/");
		
		define ("EMAIL_FROM","info@skydel.com");
		define ("EMAIL_TO","info@skydel.com");
		define ("EMAIL_FROM_NAME","");
		$BasicHURL=str_replace('index.php','',$_SERVER['PHP_SELF']);
		$HURL="http://".$_SERVER['HTTP_HOST'].$BasicHURL;
		$HURLS="http://".$_SERVER['HTTP_HOST'].$BasicHURL;
	*/
    }

?>