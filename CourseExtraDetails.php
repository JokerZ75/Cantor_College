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
    <title>Cantor College || <?php echo "{$obj->CourseTitle}"; ?> (Details)</title>
    <link rel="stylesheet" href="css/mobile.css" />
    <link rel="stylesheet" href="css/desktop.css" media="only screen and (min-width : 1190px)">


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
                <table>
                    <tr>
                        <th scope="col">Course title</th>
                        <th scope="col">Course type</th>
                        <th scope="col">Couse award</th>
                        <th scope="col">Ucas Code</th>
                        <th scope="col">Ucas Points</th>
                    </tr>
                    <tr>
                        <?php
                        echo "<td>{$obj->CourseTitle}</td>";
                        echo "<td>{$obj->CourseType}</td>";
                        echo "<td>{$obj->CourseAwardName}</td>";
                        echo "<td>{$obj->UcasCode}</td>";
                        echo "<td>{$obj->UcasPoints}</td>";
                        ?>
                    </tr>
                </table>
            </section>

            <!-- First Section On Page -->
            <section>
                <?php
                echo "<p>{$obj->CourseSummary}<br><br>Within {$obj->StudyLength} with {$obj->ModeOfAttendance} attendance starting {$obj->YearOfEntry}.<br>Is full: {$obj->NoLongerRecruiting}.<br>Foundation Year Available: {$obj->HasFoundationYear}.</p>";
                ?>
            </section>
        </main>
        <footer>
            <?php
            include("includes/footer.php");
            ?>
        </footer>
        <script src="js/NonHomeSelector.js"></script>
    </div>
</body>


</html>