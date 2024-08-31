<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $boat_type = $_POST['boat-type'];
    $duration = $_POST['duration'];
    $services = implode(", ", $_POST['additional-services'] ?? []); // Handle checkboxes
    $requests = $_POST['requests'];

    // Recipient email
    $to = "stepannovv@gmail.com"; // Replace with your email

    // Subject of the email
    $subject = "New Boat Rental Booking";

    // Message body
    $message = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Preferred Date: $date\n
    Boat Type: $boat_type\n
    Duration: $duration\n
    Additional Services: $services\n
    Special Requests or Notes: $requests
    ";

    // Email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Your booking request has been sent successfully!";
    } else {
        echo "There was an error sending your booking request. Please try again later.";
    }
}
?>