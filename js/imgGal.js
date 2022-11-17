const images = [
  "../images/Cantor_College_Charles_Enterance_min.jpg",
  "../images/Cantor_College_StayBright.jpg",
  "../images/Cantor_Inside.jpg",
];
let index = -1;

(function () {
  ChangeImage();
  setInterval(ChangeImage, 5000);
})();

function ChangeImage() {
  imageGallary = document.querySelector(".imgGal");
  index++;
  if (index >= images.length - 1) {
    index = 0;
  }
  imageGallary.setAttribute("src", images[index]);
}
