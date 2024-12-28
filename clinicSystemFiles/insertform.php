 

<!DOCTYPE html>

<!-- 
    Programmer Name: 98 
    This form allows users to enter and submit details for a new patient. It includes fields for OHIP number, 
    birthdate, first and last names, height, weight, and a dropdown to select an assigned doctor.
  -->
  
<html>
<head>
  <title>Insert New Patient</title>
  <link rel="stylesheet" type="text/css" href="insertform.css">
</head>
<body>
  <h1>CS3319 Clinic - Add a New Patient</h1>
  <form action="addpat.php" method="POST">
    
    <div class="form-row">
      <div class="form-group">
        <label for="ohip">OHIP Number:</label>
        <input type="text" id="ohip" name="ohip" maxlength="9" required>
      </div>
      
      <div class="form-group">
        <label for="birthdate">Date of Birth:</label>
        <input type="date" id="birthdate" name="birthdate" max="<?php echo date('Y-m-d'); ?>" required>
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
      </div>
      
      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group">
        <label for="height">Height (meters):</label>
        <input type="number" id="height" name="height" step="0.01" min="0" required>
      </div>
      
      <div class="form-group">
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="1" min="0" required>
      </div>
    </div>
    
    <div class="form-group full-width">
      <label for="doctor">Doctor:</label>
      <select id="doctor" name="doctor" required>
        <?php
          include 'connectdb.php';
          $query = "SELECT docid, firstname, lastname FROM doctor";
          $result = mysqli_query($connection, $query);
          
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='{$row['docid']}'>{$row['firstname']} {$row['lastname']}</option>";
            }
            mysqli_free_result($result);
          } else {
            echo "<option disabled>No doctors available</option>";
          }
          mysqli_close($connection);
        ?>
      </select>
    </div>
    
    <button type="submit">Add Patient</button>
  </form>
  <br>
    <button onclick="window.location.href='mainmenu.php'" style="margin: 10px auto; background-color: #004aad; color: white; font-family: 'Merriweather', sans-serif; font-weight: 400; padding: 10px; width: 250px; border: none; border-radius: 5px; cursor: pointer; display: block; text-align: center;">
    Back to Main Menu
</button>


</body>
</html>

