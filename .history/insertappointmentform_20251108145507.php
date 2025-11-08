<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service_type = $_POST['service_type'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $gender = $_POST['gender'];
    $message=$_POST['message'];
    $radio=$_POST['contact_method'];
  
    
  
    $sql = "INSERT INTO appointments (full_name,email,phone,service_type,appointment_date,appointment_time, gender,message,radiobtn) VALUES ('$full_name','$email','$phone','$service_type','$appointment_date','$appointment_time','$gender','$message','$radio')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Appointment booked successfully!');
            window.location='list.php';
          </script>";
} else {
    echo "<script>
            alert('Error while booking appointment.');
          </script>";
}


 
}
 
?>



