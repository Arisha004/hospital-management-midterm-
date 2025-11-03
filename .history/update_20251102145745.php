<?php

include 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
elseif(isset($_POST['id'])){
    $id=$_POST['id'];
}
else{
    die('missing id');
}
$sql="select * from appointments where id='$id' ";
$result=$conn->query($sql);
//fetch_assoc() converts a database row into  array.
/*$row = [
  "username" => "Arisha",
  "email" => "arisha@example.com",
  "password" => "hashedstringhere"
];
Access data by key:

echo $row['username']; // outputs "Arisha"
echo $row['email'];   */

$row=$result->fetch_assoc();
?>
<html></html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">

    
    
</head>
<body>
   <header class="navbar">
    <div class="logo">Hospital Appointment Management System</div>
    <nav>
      <ul>
           <li><a href="landingpage.html">Home</a></li>
          <li><a href="index.php">Book Appointment</a></li>
          
    
        </ul>
    </nav>
  </header>

   
<div class="container1">

     <h1>Update Booking Details</h1> <br>

<form  action="update.php" method="POST">
     <form id="registerForm" action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ;?>">


    <label>Full Name:</label>
    <input type="text" value="<?php echo $row['full_name'];?>" name="full_name" required pattern="^[A-Za-z]{3,}( [A-Za-z]+)?$" title="Name should contain only letters.">

    <label>Email:</label>
    <input type="email" value="<?php echo $row['email'];?>"  name="email" required>

    <label>Phone (11 digits):</label>
    <input type="text" value="<?php echo $row['phone'];?>"  name="phone" required pattern="[0-9]{11}" title="Phone number must be exactly 11 digits." maxlength="11">

    <label>Service Type:</label>
    <select name="service_type" required>
      <option value="">-- Select Service --</option>
      <option value="Consultation"
           <?php
      if($row['service_type']=='Consultation'){
        echo "selected";
      }

?>
      >Consultation</option>
      <option value="Follow-up"
                 <?php
      if($row['service_type']=='Follow-up'){
        echo "selected";
      }

?>
      >Follow-up</option>
      <option value="Check-up"
      
                  <?php
      if($row['service_type']=='Check-up'){
        echo "selected";
      }

?>
      >Check-up</option>
      <option value="Emergency"
                        <?php
      if($row['service_type']=='Emergency'){
        echo "selected";
      }

?>
      >Emergency</option>
    </select>

    <label>Appointment Date:</label>
    <input type="date" value="<?php echo $row['appointment_date'];?>"  name="appointment_date" required min="<?php echo date('Y-m-d'); ?>">

    <label>Appointment Time:</label>
    <input type="time"  value="<?php echo $row['appointment_time'];?>"name="appointment_time" required>

    <label>Gender:</label>
    <select name="gender" required>
      <option value="">-- Select Gender --</option>
      <option value="Male"
      <?php
      if($row['gender']=='Male'){
        echo "selected";
      }

?>
      >
        Male</option>
      <option value="Female"
      <?php
         if($row['gender']=='Female'){
        echo "selected";
      }
      ?>
      >Female</option>
      <option value="Other"
      <?php

   if($row['gender']=='Other'){
        echo "selected";
      }

?>
      >Other</option>
    </select>

    <label>Message (optional):</label>
    <textarea name="message" rows="3" placeholder="Add any additional notes..."><?php echo $row['message']?></textarea>
  
    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">

    <button type="submit" name="submit"> Update Appointment</button>
  </form>
 
    
  </div>




    <?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service_type = $_POST['service_type'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $gender = $_POST['gender'];
    $message=$_POST['message'];
    
  
    $sql = "Update appointments set full_name='$full_name',email='$email',phone='$phone',service_type='$service_type',appointment_date='$appointment_date',appointment_time='$appointment_time', gender='$gender',message='$message' where id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Appointment updated successfully!');
            window.location='list.php';
          </script>";
} else {
    echo "<script>
            alert('Error while updating the appointment.');
          </script>";
}



 
}


?>
 <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
</body>
</html>

