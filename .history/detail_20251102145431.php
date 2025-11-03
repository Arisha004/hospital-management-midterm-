<?php
include 'db.php';
$id=$_GET['id'];
$sql="select * from appointments where id='$id'";
$result=$conn->query($sql);


?>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
  <style>
    p{
        font-size: 18px;
        text-decoration: solid;
        color: black;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        
    }
    footer p {
        text-align: center;
  padding: 15px;
 background-color:#869CA3;
        color: black;
  font-size: 0.9rem;
    }
    h1{
        margin-top: 40px;
        text-align: center;
        color: white;
    }
    a{
    color: #007bff;
    text-decoration: none;
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

   
    <h1>Detail list of Person which has id:  <?php echo  $id ; ?></h1>
          <form action="" method="get">
<div class="container1">

    
    <p><a href="list.php"> Go back to list page</a></p><br>
    <?php
    if($result->num_rows>0){


while($row=$result->fetch_assoc()){
  
    echo "<p>ID: ".$row["id"]."<br><br></p>";
    echo "<p>NAME: ".$row["full_name"]."<br><br></p>";
    echo "<p>EMAIL: ".$row["email"]."<br><br></p>";
    echo "<p>PHONE : ".$row["phone"]."<br><br></p>";
    echo "<p>SERVICE TYPE: ".$row["service_type"]."<br><br></p>";
    echo "<p>APPOINTMENT DATE: ".$row["appointment_date"]."<br><br></p>";
    echo "<p>APPOINTMENT TIME: ".$row["appointment_time"]."<br><br></p>";
    echo "<p>GENDER: ".$row["gender"]."<br><br></p>";
    echo "<p>MESSAGE: ".$row["message"]."<br><br></p>";
    
    
    echo "<p>CREATED AT: ".$row["created_at"]."<br></p>";
    
   
    
}

    }
    else{
        echo "no records found";
    }

?>
</div>
</form>

<footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
 
</body>
</html>