<?php

//include("config.php");
class MySQLCN
{
	function MySQLCN(){
	
		$user = DB_USERNAME;
		$pass = DB_PASSWORD;
		$server = DB_SERVER;
		$dbase = DB_DATABASE;
       		$conn = @mysql_connect('localhost','root','');
mysql_select_db('dbase');
          //  $conn = mysql_connect($server,$user,$pass);
		if(!$conn) {
			$this->error("Connection attempt failed");
		}
		if(!mysql_select_db($dbase,$conn)) {
			$this->error("Dbase Select failed");
		}
		$this->CONN = $conn;
		return true;
	}

	function close()
	{	$conn = $this->CONN ;
		$close = mysql_close($conn);
		if(!$close) {
			$this->error("Connection close failed");
		}
		return true;
	}
	function error($text)
	{
		$no = mysql_errno();
		$msg = mysql_error();
		exit;
	}

	function select($sql="")
	{
		if(empty($sql)) { return false; }
/*		if(!preg_match("select",$sql))
		{
			echo "Wrong Query<hr>$sql<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}*/
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn) or die(mysql_error());
		if( (!$results) or (empty($results)) ) {
			return false;
		}
		$count = 0;
		$data = array();
		while ( $row = mysql_fetch_assoc($results))
		{
			$data[$count] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}

	function newselect ($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("^select",$sql))
		{
			echo "wrongquery<br>$sql<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn);
		if( (!$results) or (empty($results)) ) {
			return false;
		}
		$count = 0;
		$data = array();
		while ( $row = mysql_fetch_array($results))	{
			$data[$count] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}

    function affected($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("^select",$sql))
		{
			echo "wrongquery<br>$sql<p>";
			echo "<H2>Wrong function silly!</H2>\n";
			return false;
		}
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn);
		if( (!$results) or (empty($results)) ) {
			return false;
		}
		$tot=0;
		$tot=mysql_affected_rows();
		return $tot;
	}

	function insert ($sql="")
	{                 
		if(empty($sql)) { return false; }
	/*	if(!eregi("^insert",$sql))
		{
			return false;
		}*/
		if(empty($this->CONN))
		{
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		if(!$results)
		{	echo "Insert Operation Failed..<hr>" . mysql_error();
			$this->error("Insert Operation Failed..");
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$id = mysql_insert_id($this->CONN);
		return $id;
	}

	//Dont remove this - Added by sreejan//
	function adder($sql="")
	{	if(empty($sql)) { return false; }
		if(!eregi("^insert",$sql))
		{
			return false;
		}
		if(empty($this->CONN))
		{
			return false;
		}
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn);

		if(!$results)$id = "";
		else $id = mysql_insert_id();

		return $id;
	}

	function edit($sql="")
	{
		if(empty($sql)) { return false; }
		
		if(empty($this->CONN))
		{
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		if(!$results)
		{
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$rows = 0;
		$rows = mysql_affected_rows();
		return $rows;
	}

function sql_query($sql="")
	{	
	if(empty($sql)) { return false; }
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn) or die("Query Failed..<hr>" . mysql_error());
		if(!$results)
		{   $message = "Query went bad!";
			$this->error($message);
			return false;
		}
		// (Martin Huba) also SHOW... commands return some results
		if(!(eregi("^select",$sql) || eregi("^show",$sql))){
			return true; }
		else {
			$count = 0;
			$data = array();
			while ( $row = mysql_fetch_array($results))	{
				$data[$count] = $row;
				$count++;
			}
			mysql_free_result($results);
			return $data;
	 	}
	}
//ends the class over here
}
?>
