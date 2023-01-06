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

function NavChange(x) {
  if (x.matches) {
    close();
    $("nav").slideDown("fast");
  } else {
    close();
    $("nav").slideUp("fast");
  }
}

(function () {
  const dropDowns = $(".Dropdown");

  $("#burger").on("click", () => {
    $("nav").slideToggle("slow");
    close();
  });
  $(".Dropdown").each(function () {
    $(this).on("click", (ev) => {
      ev.preventDefault();
      let query =
        "." + ev.target.classList[1].toLowerCase() + "DropdownContent";
      close(query);
      $(query).slideToggle("fast");
    });
  });
  let x = window.matchMedia("only screen and (min-width : 1190px)");
  NavChange(x);
  x.addListener(NavChange);
  close();
})();
