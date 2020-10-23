<?php
$name = $_POST['name'];
$nric = $_POST['nric'];
$address = $_POST['address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$religon = $_POST['religon'];
$nationality = $_POST['nationality'];
$maritalstatus = $_POST['maritalstatus'];
$positionhistory = $_POST['positionhistory'];
$lastsalary = $_POST['lastsalary'];
$expectedsalary = $_POST['expectedsalary'];
$lastcompanyname = $_POST['lastcompanyname'];
$businesscategory = $_POST['businesscategory'];
$lastposition = $_POST['lastposition'];
$workingperiod = $_POST['workingperiod'];
$reasonleaving = $_POST['reasonleaving'];


if (!empty($name) || !empty($nric) || !empty($address) || !empty($age) || !empty($gender) || !empty($phonenumber)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "backend";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);


   if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
       } else {
        $SELECT = "SELECT nric From personal_information Where nric = ? Limit 1";
        $INSERT = "INSERT Into personal_information (name, nric, address, age, gender, phonenumber, email, religion,
        nationality, matrialstatus, positionhistory, lastsalary, expectedsalary, lastcompanyname, busniesscategory,lastposition,
        workingperiod, reasonleaving) 
        values(?, ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $nric);
        $stmt->execute();
        $stmt->bind_result($nric);
        $stmt->store_result();
        $stmt->store_result();
        $stmt->fetch();
        $rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssisisssssiisssss", $username, $password, $gender, $email, $phoneCode, $phone);
            $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>