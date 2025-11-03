<html>
<head>
<title>Book Appointment</title>
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
  <h2>Book Appointment</h2>
  <form  action="insertappointmentform.php" method="POST">

    <label>Full Name:<span>*</span></label>
    <input type="text" name="full_name" required pattern="^[A-Za-z]{3,}( [A-Za-z]+)?$"  minlength="3" 
       title="Name should contain only letters.">
  

    <label>Email:<span>*</span></label>
    <input type="email" 
   name="email" required title="enter a valid email address">

    <label>Phone (10 to 12 digits):<span>*</span></label>
    <input type="text" name="phone" required pattern="[0-9]{10,12}" title="Phone number must be exactly 11 digits." maxlength="11">

    <label>Service Type:<span>*</span></label>
    <select name="service_type" required>
      <option value=""> Select Service </option>
      <option value="Consultation">Consultation</option>
      <option value="Follow-up">Follow-up</option>
      <option value="Check-up">Check-up</option>
      <option value="Emergency">Emergency</option>
    </select>

    <label>Appointment Date:<span>*</span></label>
    <input type="date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>">

    <label>Appointment Time:<span>*</span></label>
    <input type="time" name="appointment_time" required>

    <label>Gender:<span>*</span></label>
    <select name="gender" required>
      <option value=""> Select Gender </option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Other">Other</option>
    </select>

    <label>Message (optional):</label>
    <textarea name="message"  rows="3" pattern=".*\S.*"  placeholder="Add any additional notes..."></textarea>
   
    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">

    <button type="submit" name="submit"> Book Appointment </button>
  </form>


<div style="margin-top:20px;">
    <form action="list.php" method="get">
    <button type="submit">View Data</button>
    </form>
</div>
</div>

    <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer> 
</div>
</body>
</html>