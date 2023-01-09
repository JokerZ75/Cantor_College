(function () {
  let dropDownContentHeight =
    document.querySelector(".dropdownContent").offsetHeight;
  const dropDownContents = document.querySelectorAll(".dropdownContent");
  const dropDowns = document.querySelectorAll(".Dropdown");
  const nav = document.querySelector("nav");
  const burger = document.getElementById("burger");
  let navHeight;
  dropDownContents.forEach((dropDownContent) => {
    dropDownContent.style.height = 0;
  });
  navHeight = nav.offsetHeight;
  nav.style.height = 0;

  (function SetOnClicks () {
    dropDowns.forEach((dropDown) => {
      dropDown.addEventListener("click", () => {
        let currentContent = document.querySelector(
          "." + dropDown.classList[1].toLowerCase() + "DropdownContent"
        );
        if (currentContent.style.height == "0px") {
          currentContent.style.height = dropDownContentHeight + "px";
          nav.style.height = navHeight + dropDownContentHeight + "px";
          dropDownContents.forEach((otherContents) => {
            if (otherContents != currentContent) {
              otherContents.style.height = 0;
            }
          });
        } else {
          currentContent.style.height = 0;
          if (nav.style.height != null) {
            nav.style.height = navHeight + "px";
          }
        }
      });
    });

    burger.addEventListener("click", () => {
      if (nav.style.height == "0px") {
        nav.style.height = navHeight + "px";
      } else {
        nav.style.height = 0;
        dropDownContents.forEach((dropdownContent) => {
          dropdownContent.style.height = 0;
        });
      }
    });
  })();

  let reset = () => {
    nav.style.removeProperty("height");
    dropDownContents.forEach((dropDownContent) => {
      dropDownContent.style.removeProperty("height");
    });
    dropDownContentHeight =
      document.querySelector(".dropdownContent").offsetHeight;
    dropDownContents.forEach((dropDownContent) => {
      dropDownContent.style.height = 0;
    });
    navHeight = nav.offsetHeight;
    nav.style.height = 0;
  };

  let NavChange = (x) => {
    if (x.matches) {
      nav.style.removeProperty("height");
      dropDownContents.forEach((dropDownContent) => {
        dropDownContent.style.removeProperty("height");
      });
      dropDownContentHeight =
        document.querySelector(".dropdownContent").offsetHeight;
      dropDownContents.forEach((dropDownContent) => {
        dropDownContent.style.height = 0;
      });
      navHeight = 43; // Had to hardcode this in, realistically it shouldnt be but it would get the wrong height no matter what.
    } else {
      reset();
    }
  };

  let x = window.matchMedia("only screen and (min-width : 1190px)");
  NavChange(x);
  x.addListener(NavChange);

})();
