const images = [
    "images/Cantor_Lecture_Theatre 3_min.jpg",
    "images/Cantor_Computing_Playstation_Lab.jpg",
    "images/Computer_lab_min.jpg",
  ];
  let index = -1;
  let indicators = document.querySelectorAll(".imageIndicator > img");
  let imageGallary = document.querySelector(".imgGal");
  
  (function () {
    ChangeImage();
    setInterval(ChangeImage, 5000);
    imageGallary.addEventListener("click", () => ChangeImage());
  })();
  
  function ChangeImage() {
    index++;
    if (index >= images.length - 1) {
      imageGallary.setAttribute("src", images[index]);
      indicators[index].setAttribute("src", "images/record.png");
      indicators[index - 1].setAttribute("src", "images/circle.png");
      index = -1;
      return;
    } else {
      imageGallary.setAttribute("src", images[index]);
    }
  
    if (index == 0) {
      indicators[index].setAttribute("src", "images/record.png");
      indicators[indicators.length - 1].setAttribute(
        "src",
        "images/circle.png"
      );
    } else {
      indicators[index].setAttribute("src", "images/record.png");
      indicators[index - 1].setAttribute("src", "images/circle.png");
    }
  }