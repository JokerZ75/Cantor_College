<?php
require_once("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantor College || Computing Courses</title>
    <link rel="stylesheet" href="css/mobile.css" />
    <link rel="stylesheet" href="css/desktop.css" media="only screen and (min-width : 1195px)">

</head>

<body>
    <div class=container>
        <header>
            <?php include("includes/header.php"); ?>
        </header>
        <main id=NonHome>
            <!-- Second Section On Page -->
            <section>
                <img src="images/Networking_class_min.jpg" class="imgSizer NonHomeSizer" alt="Computer Lab At Canotr College">
            </section>
            <!-- First Section On Page -->
            <section>
                <div>
                    <p>
                        The College offers a range of courses to suit applicants with varying backgrounds and educational abilities. At undergraduate level, there are single BSc Honours Degree courses in Computing, Computer Networks, Software Engineering and Cyber Security with Forensics amongst others.
                        <br>
                        <br>
                        The College teaches undergraduate and postgraduate courses in a wide range of specialisms, including computer science, software development, information systems, networking and software engineering. It is at the heart of a passionate computing community, including student societies devoted to games development, digital forensics and programming.
                        <br>
                        <br>
                        The courses are British Computer Society accredited and are highly relevant to modern industry. They are designed to prepare students for professional occupations in Computing and related fields. Many graduates continue their studies to pursue a higher degree such as an MSc. or PhD.
                    </p>
                </div>
                <div class="courseSearch">
                    <form method="get" action="Computing_Courses.php" id="searchArea">
                        <label for="searchBox"></label>
                        <input type="text" placeholder="Search for course name" name="searchBox" />
                        <input type="submit" value=" " class="submitButton" />
                    </form>
                    <table id="homeBasicTable">
                        <tr>
                            <th scope="col">Course title</th>
                            <th scope="col">Course type</th>
                            <th scope="col">Couse award</th>
                        </tr>
                        <?php
                        // Check For Search Here If Non Load All
                        $searchQuery = $_GET['searchBox'] ?? null;
                        if (is_null($searchQuery) || $searchQuery == "") {
                            $result = $mysqli->query("SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data WHERE CourseSubject = 'Computing'");
                        } else {
                            $searchQuery = "%" . $searchQuery . "%";
                            $stmt = $mysqli->prepare("SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data WHERE CourseSubject = 'Computing' AND CourseTitle LIKE ? ");
                            $stmt->bind_param('s', $searchQuery);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            echo "<p>Your Search Found {$result->num_rows} Results. Search With an Empty Field to Reset. </p>";
                        }
                        while ($obj = $result->fetch_object()) {
                            echo "<tr>";
                            echo "<td><a href=\"CourseExtraDetails.php?Course_id={$obj->Course_id}\">{$obj->CourseTitle}</a></td>";
                            echo "<td>{$obj->CourseType}</td>";
                            echo "<td>{$obj->CourseAwardName}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </section>
        </main>
        <footer id="NonHomefooter">
            <?php include("includes/footer.php"); ?>
        </footer>

    </div>
    <script src="js/NonHomeSelector.js"></script>
</body>

</html>