<?php
$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "mywork";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture and sanitize form data
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$Contact = htmlspecialchars($_POST['Contact']);
$Address = htmlspecialchars($_POST['Address']);
$city = htmlspecialchars($_POST['city']);
$password = htmlspecialchars($_POST['password']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO mywork( username, email, Contact, Address, city, password) VALUES (?, ?, ?,?,?,?)");
$stmt->bind_param("ssssss",$username, $email, $Contact, $Address, $city, $password);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>


