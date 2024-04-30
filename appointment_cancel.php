<?php
include("global.php");

session_start();

// Check if appointment_id is set
if(isset($_GET['appointment_id'])) {
    // Sanitize the appointment_id to prevent SQL injection
    $appointment_id = intval($_GET['appointment_id']);

    // Execute SQL query to delete the appointment
    $query = "delete from appointment where appointment_id = $appointment_id";

    // Check if the query was successful
    if(mysqli_query($connection, $query)) {
        // Appointment deleted successfully, redirect to appointment_view page with success message
        header("Location: appointment_view.php?message=Appointment%20canceled%20successfully");
        exit();
    } else {
        // Appointment deletion failed, redirect to appointment_view page with error message
        header("Location: appointment_view.php?error=Failed%20to%20cancel%20appointment");
        exit();
    }

    // Close database connection
    mysqli_close($connection);
} else {
    // If appointment_id is not set, redirect to appointment_view page
    header("Location: appointment_view.php");
    exit();
}
?>