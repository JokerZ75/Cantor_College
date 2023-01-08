<?php
require_once("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cantor College || Home</title>
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
    <main>
        <div id="imgGallary" class = "side">
          <img src="images/Cantor_College_Charles_Enterance_min.jpg" class="imgGal HomeSizer" alt="Gallary of images of Cantor College" />
          <button type="button" onclick="location.href = 'about_us.php' " class="aboutUsBtn">
            About Us
            <img src="images/right-arrow.png" alt="arrow to about us" width="15px" />
          </button>
          <div class="imageIndicator">
            <img src="images/circle.png" alt="" />
            <img src="images/circle.png" alt="" />
            <img src="images/circle.png" alt="" />
          </div>
        </div>
      <section>
        <div class="courseSearch">
          <form method ="get" action="index.php" id = "searchArea">
            <label for="searchBox"></label>
            <input type="text" placeholder="Search for course name" name="searchBox"/>
            <input type="submit" value= " " class = "submitButton" />
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
            if (is_null($searchQuery) || $searchQuery == ""){
              $result = $mysqli->query("SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data");
            }
            else{
              $searchQuery = "%" . $searchQuery . "%";
              $stmt = $mysqli->prepare("SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data WHERE CourseTitle LIKE ?");
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
      <section>
        <div class="findUsMap">
          <h2>How to find us:</h2>
          <iframe title="Google Maps Pin Of Cantor College Location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d76133.96984424151!2d-1.4592350489224775!3d53.39360261093698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48798338bc5a1d13%3A0xad74824d1242efa8!2sCantor%20College!5e0!3m2!1sen!2suk!4v1668694704288!5m2!1sen!2suk" width="100%" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
    </main>
    <footer>
      <?php
      include("includes/footer.php");
      ?>
    </footer>
  </div>
  <script src="js/imgGal.js"></script>
</body>

</html>