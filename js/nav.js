let close = (query = null) => {
  if (query == null) {
    $(".dropDownContent").each(function () {
      $(this).slideUp();
    });
  }
  $(".dropdownContent").each(function () {
    if ("." + $(this)[0].classList[0] != query) {
      $(this).slideUp();
    }
  });
};
let navChange = () => {
  if ($(window).width() >= 1410) {
    $("nav").slideDown("slow");
  }
};

(function () {
  const dropDowns = $(".Dropdown");
  doneMobile = false;
  doneDesktop = false;
  $("#burger").on("click", () => {
    $("nav").slideToggle("slow");
    close();
  });
  $("#burger").click();

  $(".Dropdown").each(function () {
    $(this).on("click", (ev) => {
      ev.preventDefault();
      let query =
        "." + ev.target.classList[1].toLowerCase() + "DropdownContent";
      $(query).slideToggle("fast");
      close(query);
    });
  });
  close();
  setInterval(navChange, 2000);
})();
