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
// form submitting
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $guardian_name = $_POST["guardian_name"];
    $guardian_relation = $_POST["guardian_relation"];
    $gender = $_POST["gender"];
    $cnic = $_POST["cnic"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $cell_number = $_POST["cell_number"];
    $email = $_POST["email"];
    $department = $_POST["department"];
    $designation = $_POST["designation"];
    $salary = $_POST["salary"];
    $weekly_hours = $_POST["weekly_hours"];

    $sql = "INSERT INTO employees (EmployeeID, Name, GuardianName, GuardianRelation, Gender, CNIC, Address, City, Country, CellNumber, Email, Department, Designation, Salary, WeeklyRestHours)
            VALUES ('$employee_id', '$name', '$guardian_name', '$guardian_relation', '$gender', '$cnic', '$address', '$city', '$country', '$cell_number', '$email', '$department', '$designation', '$salary', '$weekly_hours')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to confirmation page
        header("Location: congratulations.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
