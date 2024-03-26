<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validation (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($phone)) {
        // Handle empty fields error
        echo "All fields are required. Please fill out the form completely.";
    } else {
        // Connect to your database (replace these values with your actual database credentials)
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "your_database_name";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into your database (replace 'your_table_name' with your actual table name)
        $sql = "INSERT INTO your_table_name (name, email, phone) VALUES ('$name', '$email', '$phone')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful! You will receive a confirmation email shortly.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    }
} else {
    // Redirect to the homepage if the form is not submitted
    header("Location: index.html");
    exit();
}
?>
