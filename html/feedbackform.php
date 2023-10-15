<?php
include('./conn.php');

// Initialize variables
$id = '';
$name = '';
$email = '';
$course = '';
$experience = '';
$feedbackText = ''; // Renamed this variable to avoid conflicts

// Check if the form has been submitted
if (isset($_POST['sbmt'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $experience = $_POST['experience'];
    $feedbackText = $_POST['Feedback'];

    if (!empty($id)) {
        // If the form was in edit mode, update the existing feedback
        $sql = "UPDATE feedback SET name = '$name', email = '$email', course = '$course', experiance = '$experience', feedback = '$feedbackText' WHERE id = $id";
    } else {
        // If not in edit mode, insert a new feedback
        $sql = "INSERT INTO feedback(name, email, course, experiance, feedback) VALUES ('$name', '$email', '$course', '$experience', '$feedbackText')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback " . (!empty($id) ? 'updated' : 'added') . " successfully!');</script>";
        echo "<script>window.location.href = './feedback_review.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Check if we're in edit mode
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    if (isset($_GET['id'])) {
        $feedbackId = $_GET['id'];
        
        // Fetch the feedback data based on the ID
        $sql = "SELECT * FROM feedback WHERE id = $feedbackId";
        $result = mysqli_query($conn, $sql);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            // Populate form fields with the feedback data
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $course = $row['course'];
            $experience = $row['experiance'];
            $feedbackText = $row['feedback'];
        } else {
            echo "Feedback not found.";
            exit();
        }
    } else {
        echo "Feedback ID not provided.";
        exit();
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Feedback</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/feedbackn.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="../images/feedback.jpg" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="<?php echo (empty($id) ? '../includes/feedback-form-cont.php' : '../includes/edit-feedback.php'); ?>" method="POST">
				<span class="contact1-form-title">
					Provide Your Valuable Feedback
				</span>

				<div class="wrap-input1 validate-input" data-validate="Name is required">
				<?php if (!empty($id)) { ?>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<?php } ?>
    <input class="input1" type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>" required>
    <span class="shadow-input1"></span>
</div>

		<div class="wrap-input1 validate-input" data-validate="Valid email is required: ex@abc.xyz">
			<input class="input1" type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
			<span class="shadow-input1"></span>
		</div>

		<div class="course-selection">
			<label for="course-select">Course:</label>
			<select id="course-select" name="course" required>
				<option value="B-Tech" <?php if ($course === 'B-Tech') echo 'selected'; ?>>B-Tech</option>
				<option value="B-Sc" <?php if ($course === 'B-Sc') echo 'selected'; ?>>B-Sc</option>
				<option value="B.A" <?php if ($course === 'B.A') echo 'selected'; ?>>B.A</option>
			</select>
		</div>

		<div class="rating">
			<label>How will you rate your Overall experience?</label>
			<br>
			<br>
			<p>
				<label class="radio-inline">
					<input type="radio" name="experience" id="radio_experience_bad" value="bad" <?php if ($experience === 'bad') echo 'checked'; ?>>
					Bad
				</label>
				<label class="radio-inline">
					<input type="radio" name="experience" id="radio_experience_average" value="average" <?php if ($experience === 'average') echo 'checked'; ?>>
					Average
				</label>
				<label class="radio-inline">
					<input type="radio" name="experience" id="radio_experience_good" value="good" <?php if ($experience === 'good') echo 'checked'; ?>>
					Good
				</label>
			</p>
			<br>
		</div>

		<div class="wrap-input1 validate-input" data-validate="Message is required">
			<textarea class="input1" name="Feedback" placeholder="Type in Your Feedback" required><?php echo htmlspecialchars($feedbackText); ?></textarea>
			<span class="shadow-input1"></span>
		</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" type="submit" name="sbmt" value="submit">
						<span>
							Submit
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>




	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

	<script src="../js/feedback.js"></script>

</body>
</html>