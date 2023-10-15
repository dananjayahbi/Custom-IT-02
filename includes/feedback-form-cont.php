<?php
include('../html/conn.php');

if(isset($_POST['sbmt'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $experience = $_POST['experience'];
    $feedback = $_POST['Feedback'];

    $sql = "INSERT INTO feedback(name, email, course, experiance, feedback)
    VALUES ('$name', '$email', '$course', '$experience', '$feedback')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback added!');</script>";
        echo "<script>window.location.href = '../html/feedback_review.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>