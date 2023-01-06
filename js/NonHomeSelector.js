function slidingSections(x) {
  if (x.matches) {
    let sections = document.querySelectorAll("#NonHome > section");
    console.log(sections);
    sections[0].classList.add("clickable");
    sections.forEach((section) => {
      section.addEventListener("click", (e) => {
        let clickedSection = e.target;
          while (clickedSection.nodeName != "SECTION") {
            clickedSection = clickedSection.parentNode;
          }
        if (clickedSection.classList.contains("clickable")) {
          let sections = document.querySelectorAll("#NonHome > section");
          sections.forEach((section) => {
            if (section.classList.contains("clickable") == false) {
              section.classList.add("clickable");
            }
          });
          if (clickedSection == sections[0]) {
            sections[0].classList.add("SectionOneClicked");
            sections[1].classList.add("SectionTwoClicked");
          } else {
            sections[0].classList.remove("SectionOneClicked");
            sections[1].classList.remove("SectionTwoClicked");
          }
          clickedSection.classList.remove("clickable");
        }
      });
    });
  } else {
  }
}

(function () {
  let x = window.matchMedia("only screen and (min-width : 1295px)");
  slidingSections(x);
  x.addListener(slidingSections);
})();
