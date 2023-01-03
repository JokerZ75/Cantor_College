let close = (query = null) => {
  if (query == null) {
    $(".dropDownContent").each(function () {
      $(this).slideUp("slow");
    });
  }
  $(".dropdownContent").each(function () {
    if ("." + $(this)[0].classList[0] != query) {
      $(this).slideUp("slow");
    }
  });
};
let navChange = () => {
  if ($(window).width() >= 1295) {
    $("nav").slideDown("slow");
  }
};

(function () {
  const dropDowns = $(".Dropdown");
  $("#burger").on("click", () => {
    $("nav").slideToggle("slow");
    navChange();
    close();
  });
  if ($(window).width() <= 1295) {
    $("nav").slideUp("slow");
  }
  
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
  setInterval(navChange, 1500);
})();
