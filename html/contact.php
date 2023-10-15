<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Online Teacher Trainer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="../css/aboutus.css">
</head>

<body>

    <!-- CONTACT SECTION -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div>
                        <h3>How Can We Help?</h3>
                        <p>Our commitment to online teacher training goes beyond just providing courses. We understand that your path to becoming an effective educator is unique, and we're here to assist you every step of the way. </p>
                    </div>
                    <div>
                        <h3>Address</h3>
                        <p>Level 1,</p>
                        <p> Endeavour House,</p>
                        <p>1 Franklin St
                            Manuka, ACT 2603</p>
                    </div>
                    <div>
                        <h3>Reservations</h3>
                        <p>0457974636</p>
                        <p>0456345678</p>
                        <p>onlineteacher@edu.com</p>
                    </div>
                    <div>
                    <a href="../html/feedbackform.php"><button class="btn btn-white">Feedback</button></a>
                    </div>
                </div>
                <div class="col-2">
                    <form action="../includes/contact-cont.php" method="POST">
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="email" name="email" placeholder="Email Address" required>
                        <textarea row="20" cols="20" name="message" placeholder="Your Message" required></textarea>
                        <button class="btn btn-white" name="sbmt" value="submit">Send</button>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>