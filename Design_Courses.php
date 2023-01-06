<?php
require_once("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantor College || Design Courses</title>
    <link rel="stylesheet" href="css/mobile.css" />
    <link rel="stylesheet" href="css/desktop.css" media="only screen and (min-width : 1295px)">

</head>

<body>
    <div class=container>
        <header>
            <?php include("includes/header.php"); ?>
        </header>
        <main id=NonHome>
            <!-- Second Section On Page -->
            <section>
                <img src="images/Art_min.jpg" class="imgSizer" alt="Art From the College">
            </section>
            <!-- First Section On Page -->
            <section>
                <div>
                    <p>
                        The College is an internationally connected creative community of diverse disciplines housed under one roof. We shape our students' futures, preparing them to shape the world through applied knowledge and creativity.
                        <br>
                        <br>
                        The College's art and design courses don't just train you, they promote alternative ways of thinking, making and communicating; they provide you with space, tools and inspiration to develop your creative practice and a clear career path. You'll get expert teaching from active practitioners and researchers who will encourage you to adopt innovative and resourceful approaches that both perceive and create opportunities for better lives.
                        <br>
                        <br>
                        You&apos;ll develop your creative practice whilst interacting with your peers in well-equipped studios, making and digital workshops. At the same time, you'll learn professional skills by working on applied briefs facilitated through our links with commercial clients, cultural institutions, businesses and organisations.
                    </p>
                </div>
                <div class="courseSearch">
                    <form method="get" action="Design_Courses.php" id="searchArea">
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
                            $result = $mysqli->query("SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data WHERE CourseSubject = 'Art and design'");
                        } else {
                            $searchQuery = "%" . $searchQuery . "%";
                            $stmt = $mysqli->prepare("SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data WHERE CourseTitle LIKE ? AND CourseSubject = 'Art and design'");
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