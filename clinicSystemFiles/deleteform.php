<!DOCTYPE html>

<!-- Programmer Name: 98
  This script displays a list of patients, allowing the user to select a patient to delete. 
  The script retrieves patient records from the database, displays them in a table with radio buttons, 
  and includes a confirmation prompt before deleting a selected patient. It uses the deletepat.php
  to make the correct action after the user selects who they want to delete.-->

<html>
<head>
  <title>Delete Patient</title>
  <link rel='stylesheet' type='text/css' href='deleteform.css'>
  <script>
    function theDeleteMessage() {
      var confirmed = confirm('Are you sure you want to delete this person?');
      return confirmed; 
    }
  </script>
</head>
<body>
  <h1>Select a Patient to Delete</h1>
  <form action='deletepat.php' method='POST' onsubmit='return theDeleteMessage()'>
    <table border='1' cellpadding='5' cellspacing='0'>
      <tr>
        <th>Select</th>
        <th>OHIP</th>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>

<?php
include 'connectdb.php';

$query = "SELECT ohip, firstname, lastname FROM patient ORDER BY firstname ASC";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><input type='radio' name='ohip' value='{$row['ohip']}' required></td>
            <td>{$row['ohip']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
          </tr>";
}

mysqli_free_result($result);
mysqli_close($connection);
?>

    </table>
    <br>
    <button type='submit'>Delete Selected Patient</button>
  </form>
  <br>
  <button onclick="window.location.href='mainmenu.php'">Go Back to Main Menu</button>
  <br>
</body>
</html>

