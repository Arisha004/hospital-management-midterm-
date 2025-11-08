
<?php
include 'db.php';
  if(isset($_GET['search'])){
    $filteredvalues=$_GET['search'];
    $sql = "SELECT * FROM appointments 
        WHERE CONCAT(full_name, ' ', email) LIKE '%$filteredvalues%'";
    $result=$conn->query($sql);

    }
/*When the user types something in the search box, 
e.g., "Arisha", and submits the form with method="get", it goes into the URL: searching.php?search=Arisha
$_GET['search'] fetches that value from the URL.
$filteredvalues now holds the string "Arisha".
isset() is a built-in PHP function.
It checks if a variable exists and is not null.*/


?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css">
        <style>
        
 table{
    width: 70%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: 160px;
    background-color: #ddd;
 
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

   
        <form action="" method="get">
<div class="container1">
    <h1>Searching Booking Records </h1> <br>
      <p><a href="list.php"> Go back to Listing page</a></p><br>
  


    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){
    echo $_GET['search'];
}?>" placeholder="Search here">
    <button type="submit">Search</button>

</div>
</form>


<?php
if (isset($result) && $result->num_rows > 0){

echo "<table border='1' cellpadding='10'>";
  echo   "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
   
    
    </tr>";

    while($items = $result->fetch_assoc()) {
  

        echo "<tr>";

    echo "<td>".$items["id"]."</td>";
    echo "<td>".$items["full_name"]."</td>";
    echo "<td>".$items["email"]."</td>";
       echo "</tr>";    
         
        }
    
    echo "</table>";
   }
    elseif (isset($_GET['search'])){
      echo "<br>";  
        echo "No Record Found";
    }

?>

 <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
    </body>
</html>
