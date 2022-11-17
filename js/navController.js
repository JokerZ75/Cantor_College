(function () {
  const burger = document.getElementById("burger");
  const dropDown = document.querySelectorAll(".Dropdown");
  const nav = document.querySelector("nav");
  
  for (let i = 0; i < dropDown.length; i++) {
    dropDown[i].addEventListener("click", (ev) => {
      ev.preventDefault();
      let currentDropDown = ev.target;
      let query =
        "." + currentDropDown.classList[1].toLowerCase() + "DropdownContent";
      let dropdownContent = document.querySelector(query);

      if (dropdownContent.style.height == "0em") {
        let allOtherDropDown = document.querySelectorAll(".dropdownContent");
        allOtherDropDown.forEach(element => {
            element.style.height = "0em";
        });
        dropdownContent.style.height = "4.75em";
        nav.style.height = "19em";
        
      } else {
        dropdownContent.style.height = "0em";
        nav.style.height = "14em";
      }
    });
    dropDown[i].click();
  }

  burger.addEventListener("click", () => {
    if (nav.style.height == "0em") {
      nav.style.height = "14em";
    } else {
      nav.style.height = "0em";
      let allDropDown = document.querySelectorAll(".dropdownContent");
      allDropDown.forEach(element => {
          element.style.height = "0em";
      });
    }
  });
  burger.click();
})();
