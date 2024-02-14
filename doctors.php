<?php
include 'connection.php'; // Include your database connection file

// Function to fetch and display doctors
function displayDoctors($conn) {
    $sql = "SELECT * FROM doctors";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Doctors List</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Doctor's Name</th><th>Specialization</th><th>Locality</th><th>Hospital</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["doctorname"]."</td>";
            echo "<td>".$row["specialization"]."</td>";
            echo "<td>".$row["locality"]."</td>";
            echo "<td>".$row["hospital"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No doctors found";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $doctorname = $_POST['doctorname'];
    $specialization = $_POST['specialization'];
    $locality = $_POST['locality'];
    $hospital = $_POST['hospital'];

    // Prepare and execute the SQL query to insert the doctor's details into the database
    $sql = "INSERT INTO doctors (doctorname, specialization, locality, hospital) 
            VALUES ('$doctorname', '$specialization', '$locality', '$hospital')";
    $result = $conn->query($sql);

    if ($result) {
        // Insertion successful
        echo '<script>alert("Doctor added successfully")</script>';
    } else {
        // Insertion failed
        echo '<script>alert("Error: Unable to add doctor")</script>';
    }
}

// Display the list of doctors
displayDoctors($conn);
?>