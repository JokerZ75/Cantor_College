<?php
require_once("includes/config.php");
$query = "SELECT Course_id, CourseTitle, CourseType, CourseAwardName FROM course_list_data ";
$result = $mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cantor College || Home</title>
  <link rel="stylesheet" href="css/mobile.css" />
</head>

<body>
  <div class="container">
    <header>
      <?php
      include("includes/header.php");
      ?>
    </header>
    <main>
      <section>
        <img src="" class="imgGal" alt="Gallary of images of Cantor College" />
        <button type="button" onclick="taketoabout" class="aboutUsBtn">
          About Us
          <img src="images/right-arrow.png" alt="arrow to about us" width="15px" />
        </button>
        <div class="imageIndicator">
          <img src="images/circle.png" alt="" />
          <img src="images/circle.png" alt="" />
          <img src="images/circle.png" alt="" />
        </div>
      </section>
      <section>
        <div class="courseSearch">
          <label for="searchBox"></label>
          <input type="text" placeholder="Search for course" id="searchBox" />
          <button type="button" onclick="somephpjs">
            <img src="images/magnifying-glass.png" alt="Search Button" width="10px" />
          </button>
          <table id="homeBasicTable">
            <tr>
              <th scope="col">Course title</th>
              <th scope="col">Course type</th>
              <th scope="col">Couse award</th>
            </tr>
            <?php
            while ($obj = $result->fetch_object()) 
            {
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
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d76133.96984424151!2d-1.4592350489224775!3d53.39360261093698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48798338bc5a1d13%3A0xad74824d1242efa8!2sCantor%20College!5e0!3m2!1sen!2suk!4v1668694704288!5m2!1sen!2suk" width="100%" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </section>
    </main>
    <footer>
      <?php
      include("includes/footer.php");
      ?>
    </footer>
  </div>
  <script src="js/navController.js"></script>
  <script src="js/imgGal.js"></script>
</body>

</html>