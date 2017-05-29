<?php
include_once("connect.php");

$tbl_available = "CREATE TABLE IF NOT EXISTS available (
				  id int(11) NOT NULL AUTO_INCREMENT,
  				  tablenum varchar(50) NOT NULL,
                  avail int(11) NOT NULL,
                  price varchar(20) NOT NULL,
                  PRIMARY KEY (id)
                  )";
$query = mysqli_query($connect, $tbl_available);
if ($query === TRUE) {
	echo "<h3>available table created OK :) </h3>"; 
} else {
	echo "<h3>available table NOT created :( </h3>"; 
}
$tbl_confirms = "CREATE TABLE IF NOT EXISTS confirms (
				  id int(11) NOT NULL AUTO_INCREMENT,
  				  tablename varchar(50) NOT NULL,
  				  numseats int(11) NOT NULL,
                  person varchar(255) NOT NULL,
                  email varchar(255) NOT NULL,
                  PRIMARY KEY (id)
                  )";
$query = mysqli_query($connect, $tbl_confirms);
if ($query === TRUE) {
	echo "<h3>confirms table created OK :) </h3>"; 
} else {
	echo "<h3>confirms table NOT created :( </h3>"; 
}
$tbl_reserves = "CREATE TABLE IF NOT EXISTS reserves (
				  id int(11) NOT NULL AUTO_INCREMENT,
  				  tablenumber varchar(50) NOT NULL,
  				  numseats int(11) NOT NULL,
  				  restime datetime NOT NULL,
  				  PRIMARY KEY (id)
                  )";
$query = mysqli_query($connect, $tbl_reserves);
if ($query === TRUE) {
	echo "<h3>reserves table created OK :) </h3>"; 
} else {
	echo "<h3>reserves table NOT created :( </h3>"; 
}
$tbl_insert = "INSERT INTO available (tablenum,avail,price,ep_id) 
			   VALUES ('Table 1', 10, '$10.00',1),
			   ('Table 2', 10, '$10.00',1),
			   ('Table 1', 10, '$10.00',2),
			   ('Table 2', 10, '$10.00',2),
			   ('VIP Table 1', 10, '$20.00',2),
			   ('Table 1', 10, '$10.00',4),
			   ('Table 2', 10, '$10.00',4),
			   ('VIP Table 1', 10, '$20.00',4),
			   ('VIP Table 1', 10, '$20.00',1)";
$query = mysqli_query($connect, $tbl_insert);
if ($query === TRUE) {
	echo "<h3>Starting data inserted OK :) </h3>"; 
} else {
	echo "<h3> NOT inserted :( </h3>"; 
}
?>