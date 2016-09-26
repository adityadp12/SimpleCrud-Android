<?php
 

/*
 * Berikut adalah kelas untuk menghapus data mahasiswa
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['id_mhs'])) {
    $id_mhs = $_POST['id_mhs'];
 
    // include db connect class
    //require_once '../simple_crud/db_connect.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
 
    $con = mysqli_connect('mysql.idhostinger.com', 'u962869958_mhs', 'aditya1478', 'u962869958_mhs');
    $result = mysqli_query($con,"DELETE FROM mahasiswa WHERE id_mhs = $id_mhs");
 
    // check if row deleted or not
    if (mysqli_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "successfully deleted";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>