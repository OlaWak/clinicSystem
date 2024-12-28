<?php

/*
  Programmer Name: 98
  This script retrieves and displays the list of patients for the selected doctor.
  It ensures the output is neatly formatted in a table with proper styling.
*/

include 'connectdb.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['docid'])) {
    $docid = mysqli_real_escape_string($connection, $_POST['docid']);

    // Fetch patient data for the selected doctor
    $query = "
        SELECT p.ohip, p.firstname, p.lastname, p.birthdate, p.weight, p.height
        FROM patient p
        WHERE p.treatsdocid = '$docid'
        ORDER BY p.firstname ASC";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed: " . mysqli_error($connection));
    }

    echo "<!DOCTYPE html>
    <html>
    <head>
      <title>Doctor's Patients</title>
      <link rel='stylesheet' type='text/css' href='docform.css'> 
    </head>
    <body>
      <h1>Patients of the Selected Doctor</h1>";

    // Check if any patients exist for the doctor
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                  <th>OHIP</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Birthdate</th>
                  <th>Weight (kg)</th>
                  <th>Height (m)</th>
                </tr>";

        // Display each patient in a table row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['ohip']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['birthdate']}</td>
                    <td>{$row['weight']}</td>
                    <td>{$row['height']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No patients found for the selected doctor.</p>";
    }

    echo "<br>
          <button onclick=\"window.location.href='mainmenu.php'\" style=\"display: block; margin: 10px 0; background-color: #004aad; color: white; font-family: 'Merriweather', sans-serif; font-weight: 400; padding: 10px; width: 250px; border: none; border-radius: 5px; cursor: pointer;\">Back to Main Menu</button>
          </body>
          </html>";

    mysqli_free_result($result);
    mysqli_close($connection);
} 
?>