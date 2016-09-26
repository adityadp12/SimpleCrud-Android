<?php

/*
 * Berikut adalah kelas untuk membaca data mahasiswa
 */

// array for JSON response
$response = array();
 

 error_reporting(E_ALL ^ E_DEPRECATED);
// include db connect class
//require_once '../simple_crud/db_connect.php';
 
// connecting to db
//$db = new DB_CONNECT();
 
$con = mysqli_connect('mysql.idhostinger.com', 'u962869958_mhs', 'aditya1478', 'u962869958_mhs');

$sql = "SELECT * FROM mahasiswa";
//$mhs_result = mysql_query ($sql) or die(mysql_error()); //run the query

$mhs_result = mysqli_query($con,"SELECT * FROM mahasiswa")or die($mysqli->error.__LINE__);;

	// check for empty result
	if (mysqli_num_rows($mhs_result) > 0) {

		$response["mahasiswa"] = array();
 
		while ($row = mysqli_fetch_array($mhs_result)) {
			// temp user array
			$mahasiswa = array();
			$mahasiswa["id_mhs"] = $row["id_mhs"];
			$mahasiswa["nama"] = $row["nama"];
			$mahasiswa["nim"] = $row["nim"];
 
			// push single puasa into final response array
			array_push($response["mahasiswa"], $mahasiswa);
		}
		// success
		$response["success"] = 1;
 
		// echoing JSON response
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "Tidak ada data mahasiswa";
 
		// echo no users JSON
		echo json_encode($response);
	}
?>