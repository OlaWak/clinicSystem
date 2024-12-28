<!DOCTYPE html>

<!-- Programmer Name: 98 
This is the main menu for the CS3319 Clinic application. Users can navigate to 
various actions related to patient and doctor management throught 7 buttons 
that match the assignemnt requirments. -->

<html>
<head>
<title> CS3319 CLINIC </title>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="mainmenu.css">
</head>
<body>
<?php
  include 'connectdb.php';
?>
<h1> CS3319 CLINIC </h1>
<h4>Please Select your Action From the Main Menu </h4>
<button type="button" id="but1" onclick="window.location.href='listform.php';">List All Patients</button>
<button type="button" id="but2" onclick="window.location.href='insertform.php';" > Insert New Patient  </button>
<button type="button" id="but3" onclick="window.location.href='deleteform.php';" > Delete Existing Patient  </button>
<button type="button" id="but4" onclick="window.location.href='modifyform.php';" > Modify Existing Patient  </button>
<button type="button" id="but5" onclick="window.location.href='docnopat.php';" > Doctors Without Patients  </button>
<button type="button" id="but6" onclick="window.location.href='docwithpat.php';" > Doctors and Their Patients  </button>
<button type="button" id="but7" onclick="window.location.href='nurseform.php';" > Find Nurse By Name  </button>

</body>
</html>
