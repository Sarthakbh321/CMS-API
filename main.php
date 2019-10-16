<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "cms";

$rfid = $_POST['rfid'];
$name = $_POST['name'];
$evnt_name = $_POST['event'];
$register_number = $_POST['regis'];
$email = $_POST['email'];
$phone = $_POST['phone'];
date_default_timezone_set("America/New_York");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} 
catch (mysqli_sql_exception $ex) {
    echo 'Error';
}
if(!empty($rfid))
{
    
    $search_Query = "SELECT * FROM data WHERE rfid = '$rfid'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $rfid1 = $row['Rfid'];
                $name1 = $row['Name'];
                echo "User already exisit with " . $name1 . ".";
            }
         }
        else{
           $time = date("h:i:sa");
            $sql = "INSERT INTO `data`(`Name`, `Event_name`, `Registration_number`, `Email`, `Phone_Number`, `Rfid`, `Time`) VALUES ('$name','$evnt_name','$register_number','$email','$phone','$rfid','$time')";
            try{
               $add = mysqli_query($connect, $sql);

           if($add){
               if(mysqli_affected_rows($connect) > 0){
                   echo 'Data Updated';
                   }
               else{
                   echo 'Data Not Updated';
                   }
               }
           }
           catch (Exception $ex) {
               echo 'Error Update '.$ex->getMessage();
               }
         
         
         }
        }
    }
    else{
        echo 'Result Error';
    }
?>