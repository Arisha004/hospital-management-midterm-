<?php

include 'db.php';
$id=$_GET['id'];
$sql="Delete from appointments where id ='$id'";
 $result=$conn->query($sql);
  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Appointment deleted successfully!');
            window.location='list.php';
          </script>";
} else {
    echo "<script>
            alert('Error while deleting the appointment.');
          </script>";
}


?>