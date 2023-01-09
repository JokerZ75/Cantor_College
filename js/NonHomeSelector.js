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
    let sections = document.querySelectorAll("#NonHome > section");
    sections[0].classList.remove("SectionOneClicked");
    sections[1].classList.remove("SectionTwoClicked");
    sections[0].classList.remove("clickable");
    sections[1].classList.remove("clickable");

  }
}

(function () {
  let x = window.matchMedia("only screen and (min-width : 1195px)");
  slidingSections(x);
  x.addListener(slidingSections);
})();
