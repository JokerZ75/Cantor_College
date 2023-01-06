<?php require_once("includes/config.php");
$Fname = $_POST['FirstName'] ?? null;
$Lname = $_POST['LastName'] ?? null;
$Email = $_POST['Email'] ?? null;
$Message = $_POST['Message'] ?? null;
$ValidInput = false;
if (($Fname && $Lname && $Email && $Message) != (null || "")) {
    $ValidInput = true;
    $Fname = trim($Fname);
    $Lname = trim($Lname);
    $Email = trim($Email);
    $Message = trim($Message);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantor College || Contact Us</title>
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/desktop.css" media="only screen and (min-width : 1295px)">

</head>

<body>
    <div class="container">
        <header>
            <?php include("includes/header.php"); ?>
        </header>
        <main id="NonHome">
            <!-- Second Section On Page -->
            <section>
                <?php
                if ($ValidInput == true) {
                    $fullname = $Fname . " " . $Lname;  
                    echo "<p>Thank you <strong> {$fullname} </strong>. Your message of <strong> {$Message} </strong> has been submitted with the following email <strong> {$Email} </strong>. </p>";
                    // Help stop repeat inputs from the same email with the same message
                    $stmt = $mysqli->prepare("SELECT * FROM user_messages WHERE Message = ? AND Email = ?"); 
                    $stmt->bind_param('ss', $Message, $Email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows == 0) {
                        $stmt = $mysqli->prepare("INSERT INTO user_messages (FirstName, LastName, Email, Message) VALUES (?,?,?,?)");
                        $stmt->bind_param('ssss', $Fname, $Lname, $Email, $Message);
                        $stmt->execute();
                    }
                }
                ?>
            </section>
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
                            <textarea name="Message" placeholder="Your Message (Max character length 500)" maxlength="500"></textarea>
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
        <script src="js/NonHomeSelector.js"></script>
    </div>
</body>

</html>