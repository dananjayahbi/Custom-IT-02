<?php
include('../html/conn.php');

// Fetch all feedback from the database
$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {
    // Display feedback as cards
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="reviewItem">';
        echo '<div class="top">';
        echo '<div class="clientImage">';
        echo '<span class="avatar-icon"><i class="fas fa-user"></i></span>';
        echo '<span>' . htmlspecialchars($row['name']) . '</span>';
        echo '</div>';
        echo '<ul>';
        // Adjust the rating display based on the actual rating in the database
        $rating = $row['rating'];
        for ($i = 0; $i < $rating; $i++) {
            echo '<li><i class="fa-solid fa-star"></i></li>';
        }
        for ($i = $rating; $i < 5; $i++) {
            echo '<li><i class="fa-regular fa-star"></i></li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '<article>';
        echo '<p class="review">' . htmlspecialchars($row['feedback']) . '</p>';
        echo '<p>' . htmlspecialchars($row['date']) . '</p>';
        echo '<div class="review-actions">';
        echo '<button class="edit-review"><a href="edit-feedback.php?id=' . $row['id'] . '">Edit</a></button>';
        echo '<button class="delete-review" onclick="deleteFeedback(' . $row['id'] . ')">Delete</button>';
        echo '</div>';
        echo '</article>';
        echo '</div>';
    }
}

mysqli_close($conn);
?>
