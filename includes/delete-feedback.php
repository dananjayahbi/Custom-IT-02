<?php
include('../html/conn.php');

if (isset($_GET['id'])) {
    $feedbackId = $_GET['id'];

    // Construct a DELETE query to remove the feedback entry
    $sql = "DELETE FROM feedback WHERE id = $feedbackId";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the feedback review page after deleting
        header('Location: ../html/feedback_review.php');
        exit();
    } else {
        echo "Error deleting feedback: " . mysqli_error($conn);
    }
} else {
    echo "Feedback ID not provided.";
}

mysqli_close($conn);
?>
