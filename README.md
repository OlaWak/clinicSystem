# Clinic System Website

This project is a clinic management system designed to handle various tasks such as managing patients, doctors, and nurses efficiently. The system is built using PHP, MySQL, HTML, CSS, and JavaScript.

## Features

### 1. **Patient Management**
- **List All Patients:**
  - Displays all patient details, including:
    - First Name
    - Last Name
    - OHIP Number
    - Weight (in kilograms and pounds)
    - Height (in meters and feet & inches)
    - Assigned Doctor (First Name, Last Name).
- **Sorting Options:**
  - Sort by First Name or Last Name.
  - Choose Ascending or Descending order using radio buttons.

- **Add Patient:**
  - Input required fields:
    - First Name
    - Last Name
    - OHIP Number (validated for uniqueness).
    - Weight and Height.
    - Assigned Doctor (selected from available doctors).
  - Displays an error message if the OHIP number is already in use.

- **Delete Patient:**
  - Options:
    - Select from a list of patients.
    - Enter the OHIP number manually.
  - Validates existing OHIP numbers before deletion.
  - Confirms deletion with a prompt (e.g., "Are you sure you want to delete this person?").

- **Modify Patient:**
  - Update a patient's weight:
    - Input weight in pounds or kilograms.
    - Automatically converts and stores the weight in kilograms.

### 2. **Doctor Management**
- **Unassigned Doctors:**
  - Displays the first name, last name, and ID of doctors without any assigned patients.
- **Doctor-Patient Overview:**
  - Lists the first and last names of doctors along with the first and last names of their patients.

### 3. **Nurse Management**
- **Nurse Details:**
  - Prompt for a nurse and display:
    - First and last name of the nurse.
    - First and last names of doctors the nurse works for.
    - Hours worked for each doctor.
  - Summary:
    - Total hours worked by the nurse.
    - First and last name of the supervising nurse.

### 4. **Main Menu**
- The main menu (`mainmenu.php`) serves as the starting point, providing navigation to all functionalities.

## How to Set Up

1. **Database Setup:**
   - Create a database named `clinic_system` (or your preferred name).
   - Use the following SQL template to create and populate the necessary tables with sample data:
     ```sql
     CREATE TABLE Doctors (
         doctor_id INT AUTO_INCREMENT PRIMARY KEY,
         first_name VARCHAR(50),
         last_name VARCHAR(50)
     );

     CREATE TABLE Patients (
         patient_id INT AUTO_INCREMENT PRIMARY KEY,
         first_name VARCHAR(50),
         last_name VARCHAR(50),
         ohip_number VARCHAR(15) UNIQUE,
         weight_kg DECIMAL(5,2),
         height_m DECIMAL(4,2),
         doctor_id INT,
         FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id)
     );

     CREATE TABLE Nurses (
         nurse_id INT AUTO_INCREMENT PRIMARY KEY,
         first_name VARCHAR(50),
         last_name VARCHAR(50),
         supervisor_id INT
     );

     CREATE TABLE NurseDoctorHours (
         nurse_id INT,
         doctor_id INT,
         hours_worked DECIMAL(5,2),
         PRIMARY KEY (nurse_id, doctor_id),
         FOREIGN KEY (nurse_id) REFERENCES Nurses(nurse_id),
         FOREIGN KEY (doctor_id) REFERENCES Doctors(doctor_id)
     );

     INSERT INTO Doctors (first_name, last_name) VALUES
         ('John', 'Doe'),
         ('Jane', 'Smith'),
         ('Emily', 'Clark');

     INSERT INTO Patients (first_name, last_name, ohip_number, weight_kg, height_m, doctor_id) VALUES
         ('Alice', 'Brown', 'OHIP123', 70.5, 1.65, 1),
         ('Bob', 'Green', 'OHIP124', 80.2, 1.75, 2);

     INSERT INTO Nurses (first_name, last_name, supervisor_id) VALUES
         ('Anna', 'Taylor', NULL),
         ('James', 'Anderson', 1);

     INSERT INTO NurseDoctorHours (nurse_id, doctor_id, hours_worked) VALUES
         (1, 1, 40.0),
         (1, 2, 30.0);
     ```

   - Update your `config.php` file with your database connection details.

2. **Local Server:**
   - Use tools like XAMPP or WAMP to set up a local server.

3. **Testing Data:**
   - Populate the database using the above SQL statements to ensure sufficient test data.

## Technologies Used

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)

## Testing Instructions

1. Navigate to `http://localhost/mainmenu.php` to start.
2. Test each feature:
   - List, add, delete, and modify patients.
   - View unassigned doctors.
   - View doctor-patient relationships.
   - Query nurse information.
3. Validate error handling by:
   - Attempting to add duplicate OHIP numbers.
   - Deleting non-existent patients.

## Files and Structure

- **PHP Files:**
  - `mainmenu.php`
  - `docform.php`
  - `docnopat.php`
  - `docwithpat.php`
  - `findnurse.php`
  - `addpat.php`
  - `deleteform.php`
  - `deletepat.php`
  - `insertform.php`
  - `listform.php`
  - `listpat.php`
  - `modifyform.php`
  - `modifypat.php`
  - `nurseform.php`

- **CSS Files:**
  - `docform.css`
  - `mainmenu.css`
  - `insertform.css`
  - `listform.css`
  - `modifyform.css`
  - `nurseform.css`

## Error Handling

- **Add Patient:** Validates OHIP number uniqueness.
- **Delete Patient:** Confirms and validates OHIP number before deletion.
- **General:** Displays user-friendly error messages for invalid inputs.

## Future Enhancements

- Implement user authentication for role-based access.
- Add responsive design for better mobile usability.
- Provide advanced filtering and search capabilities for patient data.

---

This project is designed to simplify clinic management. Please ensure your database is properly populated before testing.
