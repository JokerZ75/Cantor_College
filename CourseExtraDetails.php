<?php
require_once("includes/config.php");
$query = $_GET['Course_id'];
$stmt = $mysqli->prepare("SELECT * FROM course_list_data WHERE Course_id = ?");
$stmt->bind_param('s', $query);
$stmt->execute();
$result = $stmt->get_result();
$obj = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <link rel="stylesheet" href="css/mobile.css" />

</head>

<body>
    <div class="container">

        <header>
            <?php
            include("includes/header.php");
            ?>
        </header>
        <main id=NonHome>
            <!-- Second Section On Page -->
            <section>

            </section>

            <!-- First Section On Page -->
            <section>
                <?php
                echo "<h2>h{$obj->CourseTitle}</h2>";
                ?>
                <h2>hi</h2>
            </section>
        </main>
        <footer>
            <?php
            include("includes/footer.php");
            ?>
        </footer>
</body>
</div>

</html>