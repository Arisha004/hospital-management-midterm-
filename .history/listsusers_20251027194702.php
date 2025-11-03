<?php
include 'db.php';
$sql="select * from users";
$result=$conn->query($sql);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
  <link rel="stylesheet" href="style2.css">
  <style>
     .container1 { width: 80%; margin: 40px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
 
    table{
    width: 100%;
    border-collapse: collapse;
    justify-content: center;
    margin-top: 20px;

  }
  h2{
    text-align: left;
    margin-bottom: 10px;
  }
  
  th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid black;
  }
  tr:hover {background-color: #f1f1f1;}
a{
  color: #007bff;
}

  </style>

    
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
    <h2>List of Users</h2><br>
    <a href="login.php">Go back</a>
    
    
    
   <?php
   
   
if ($result->num_rows > 0){

echo "<table border='1' cellpadding='10'>";
  echo   "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>

    <th>Password</th>
    
    </tr>";
  while($items = $result->fetch_assoc()) {
  

        echo "<tr>";

    echo "<td>".$items["id"]."</td>";
    echo "<td>".$items["username"]."</td>";
    echo "<td>".$items["email"]."</td>";
    echo "<td>".$items["password"]."</td>";
   

       echo "</tr>";    
         
        }
    
    echo "</table>";
   }
    else{
      echo "<br>";  
      echo "No Record Found";
    }



    

?>

</div>
 <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
</body>
</html>