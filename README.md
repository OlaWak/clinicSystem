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
   - Import the provided SQL script to populate the database:
     ```
     https://www.csd.uwo.ca/~lreid2/cs3319/assignments/assignment3/moredatafall2024.sql
     ```
   - Use the `config.php` file to set your database connection details.

2. **Local Server:**
   - Use tools like XAMPP or WAMP to set up a local server.

3. **Testing Data:**
   - Ensure the database contains sufficient data for testing all functionalities. Use the above SQL script for pre-filled data.

## Technologies Used

<div style="display: flex; flex-direction: column; align-items: center;">
  <button style="margin: 5px; padding: 10px; background-color: #004aad; color: white; border: none; border-radius: 5px; font-family: 'Merriweather', sans-serif; font-size: 1rem; width: 200px;">
    PHP (Backend)
  </button>
  <button style="margin: 5px; padding: 10px; background-color: #004aad; color: white; border: none; border-radius: 5px; font-family: 'Merriweather', sans-serif; font-size: 1rem; width: 200px;">
    MySQL (Database)
  </button>
  <button style="margin: 5px; padding: 10px; background-color: #004aad; color: white; border: none; border-radius: 5px; font-family: 'Merriweather', sans-serif; font-size: 1rem; width: 200px;">
    HTML & CSS (Frontend)
  </button>
  <button style="margin: 5px; padding: 10px; background-color: #004aad; color: white; border: none; border-radius: 5px; font-family: 'Merriweather', sans-serif; font-size: 1rem; width: 200px;">
    JavaScript (Interactivity)
  </button>
</div>

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
  - `mainmenu.php`: Main menu and navigation.
  - `docform.php`: Handles doctor-patient forms.
  - `docnopat.php`: Displays doctors with no patients.
  - `docwithpat.php`: Displays doctors and their patients.
  - `findnurse.php`: Displays nurse details.

- **CSS Files:**
  - `docform.css`: Styling for forms and tables ([source](17)).
  - `mainmenu.css`: Styling for main menu ([source](18)).

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

