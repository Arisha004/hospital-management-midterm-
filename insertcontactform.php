<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    

    $sql = "INSERT INTO contactform (name, email, phone, message) VALUES ('$name', '$email', '$phone','$message')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Form submitted successfully!');
            window.location='landingpage.html';
          </script>";
} else {
    echo "<script>
            alert('Error while submitting form.');
          </script>";
}


 
}
 
?>



