var doneMobile;
var doneDesktop;
(function () {
  doneMobile = false;
  doneDesktop = false;
  $("#burger").on("click", () => {
    $("nav").slideToggle("slow");
  });
  $("#burger").click();

  $(".Dropdown").each(function () {
    $(this).on("click", (ev) => {
      ev.preventDefault();
      let query = "." + ev.target.classList[1].toLowerCase() + "DropdownContent"
      $(query).slideToggle("fast");
        console.log(ev.target.classList[1]);
      $(".dropdownContent").each(function () {
        if ("." + $(this)[0].classList[0] != query) {
          $(this).slideUp();
        }
      });
    });
    $(this).click();
  });

  $(window).resize(function () {
    nav();
  });
})();
let nav = () => {
//   if ($(window).width() < 1410 && doneMobile == false) {
//     doneMobile = true;
//     doneDesktop = false;
//     close();
//     $("#burger").on("click", () => {
//       $("nav").slideToggle("slow");
//     });
//     $("#burger").click();
//   } else if ($(window).width() > 1410 && doneDesktop == false) {
//     doneDesktop = true;
//     doneMobile = false;
//     close();
//   }
};

let close = () => {
//   $(".Dropdown").each(function () {
//     if ($(this).is(":visible")) {
//       $(this).click();
//     }
//   });
};
