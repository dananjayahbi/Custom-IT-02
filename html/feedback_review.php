<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Review UI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/feedbackreview.css">
</head>

<body>
<div class="background-image"></div>

<!-- Main Container for Clients Review -->
<div class="container">
    <h2>A lot of Happy Student</h2>
    <p class="description">
        "An enthusiastic group of content and satisfied student unicorns, enjoying their educational journey to the fullest!"
    </p>
    <!-- Clients Review Section -->
    <div class="reviewSection">
        <?php
        include('./conn.php');
        $sql = "SELECT * FROM feedback";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="reviewItem">';
                echo '<div class="top">';
                echo '<div class="clientImage">';
                echo '<span class="avatar-icon"><i class="fas fa-user"></i></span>';
                echo '<span>' . htmlspecialchars($row['name']) . '</span>';
                echo '</div>';
                echo '</div>';
                echo '<article>';
                echo '<p class="review">' . htmlspecialchars($row['feedback']) . '</p>';
                echo '<div class="review-actions">';
                echo '<button class="edit-review"><a href="feedbackform.php?id=' . $row['id'] . '&action=edit">Edit</a></button>';
                echo '<button class="delete-review" onclick="confirmDelete(' . $row['id'] . ')">Delete</button>';
                echo '</div>';
                echo '</article>';
                echo '</div>';
            }
        } else {
            echo '<p>No feedback available.</p>';
        }

        mysqli_close($conn);
        ?>

    </div>
</div>
<script>
function confirmDelete(feedbackId) {
    if (confirm("Are you sure you want to delete this feedback?")) {
        // If the user confirms, redirect to the delete-feedback.php script
        window.location.href = `../includes/delete-feedback.php?id=${feedbackId}`;
    }
}
</script>
</body>
</html>
