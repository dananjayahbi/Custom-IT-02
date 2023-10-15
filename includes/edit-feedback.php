<?php
include('../html/conn.php');

// Check if the form has been submitted
if (isset($_POST['sbmt'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $experience = $_POST['experience'];
    $feedbackText = $_POST['Feedback'];
    $id = $_POST['id'];

    // Update the existing feedback
    $sql = "UPDATE feedback SET name = '$name', email = '$email', course = '$course', experiance = '$experience', feedback = '$feedbackText' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback updated successfully!');</script>";
        echo "<script>window.location.href = '../html/feedback_review.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
