<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employeemanagment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the next available Employee ID
$sql = "SELECT MAX(EmployeeID) as max_id FROM employees";
$result = $conn->query($sql);
if (!$result) {
    die("Error fetching Employee ID: " . $conn->error);
}
$row = $result->fetch_assoc();
$employee_id = $row["max_id"] + 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // JavaScript function for form validation
        function validateForm() {
            var cnicPattern = /^\d{5}-\d{7}-\d$/;
            var phonePattern = /^\d{11}$/;

            var cnic = document.forms["registrationForm"]["cnic"].value;
            var phone = document.forms["registrationForm"]["cell_number"].value;

            if (!cnicPattern.test(cnic)) {
                alert("Enter CNIC in 12345-1234567-1 format");
                return false;
            }

            if (!phonePattern.test(phone)) {
                alert("Enter 11 digits for Cell Number");
                return false;
            }

            return true;
        }

        // JavaScript function to print the form
        function printForm() {
            window.print();
        }
    </script>
</head>
<body>
    <h2>Employee Registration Form</h2> 

    <form style="margin: 90px;" name="registrationForm" action="process_form.php" method="post" onsubmit="return validateForm()">
        <!-- Employee ID will be generated automatically -->
        <label for="employee_id">Employee ID:</label>
        <input type="text" name="employee_id" value="<?php echo $employee_id; ?>" readonly><br>

        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="guardian_name">Guardian Name:</label>
        <input type="text" name="guardian_name" required><br>

        <label for="guardian_relation">Guardian Relation:</label>
        <input type="text" name="guardian_relation" required><br>

        <label for="gender">Gender:</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label for="cnic">CNIC:</label>
        <input type="text" name="cnic" pattern="\d{5}-\d{7}-\d" title="Enter CNIC in 12345-1234567-1 format" required><br>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br>

        <label for="city">City:</label>
        <input type="text" name="city" required><br>

        <label for="country">Country:</label>
        <input type="text" name="country" required><br>

        <label for="cell_number">Cell Number:</label>
        <input type="tel" name="cell_number" pattern="\d{11}" title="Enter 11 digits" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="department">Department:</label>
        <input type="text" name="department" required><br>

        <label for="designation">Designation:</label>
        <input type="text" name="designation" required><br>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" required><br>

        <label for="weekly_hours">Weekly Rest Hours:</label>
        <input type="number" name="weekly_hours" required><br>

        <button type="submit" name="save">Save Form</button>
        <button type="button" onclick="printForm()">Print Form</button>
    </form>
</body>
</html>
