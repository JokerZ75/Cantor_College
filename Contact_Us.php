<?php require_once("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantor College || Contact Us</title>
    <link rel="stylesheet" href="css/mobile.css">
</head>

<body>
    <div class="container">
        <header>
            <?php include("includes/header.php"); ?>
        </header>
        <main id="NonHome">
            <!-- Second Section On Page -->
            <section></section>
            <!-- First Section On Page -->
            <section>
                <div>
                    <p>Your can leave us a message using the form below. Or Contact us using any other method using the details from the footer.</p>
                </div>
                <div>
                    <form method="post" action="Contact_Us.php" id="ContactForm">
                        <div>
                            <label for="FirstName">First Name:</label>
                            <input type="text" placeholder="First Name (e.g John)" name="FirstName" />
                        </div>
                        <div>
                            <label for="LastName">Last Name:</label>
                            <input type="text" placeholder="Second Name (e.g Smith)" name="LastName">
                        </div>
                        <div>
                            <label for="Email">Email:</label>
                            <input type="email" placeholder="Email" name="Email">
                        </div>
                        <div>
                            <label for="Message">Message:</label>
                            <textarea name="Message" placeholder="Your Message"></textarea>
                        </div>
                        <div>
                            <input type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <footer>
            <?php include("includes/footer.php"); ?>
        </footer>
    </div>
</body>

</html>