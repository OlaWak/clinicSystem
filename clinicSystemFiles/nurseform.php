<?php

/*
  Programmer Name: 98
  This script retrieves and displays a list of nurses, allowing the user 
  to select a nurse from a dropdown menu. After selecting, the user can view the nurse's details by submitting the form.
*/

include 'connectdb.php';


$query = "SELECT nurseid, firstname, lastname FROM nurse ORDER BY firstname ASC";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

echo "<!DOCTYPE html>
<html>
<head>
  <title>Select a Nurse</title>
  <link rel='stylesheet' type='text/css' href='nurseform.css'> 
</head>
<body>
  <h1>Select a Nurse</h1>
  <form action='findnurse.php' method='POST'> 
    <label for='nurseid'>Choose a Nurse:</label>
    <select name='nurseid' id='nurseid' required>";


while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['nurseid']}'>{$row['firstname']} {$row['lastname']} ({$row['nurseid']})</option>";
}

echo "  </select>
        <br><br>
        <button type='submit'>View Details</button>
      </form>
    </body>
    </html>";

mysqli_free_result($result);
mysqli_close($connection);
?>

