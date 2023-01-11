(function () {
  let PageArea = document.querySelector(".CurrentPage");
  if (document.title.includes("||")) {
    PageArea.innerHTML = "<h1>" + document.title.split("||")[1] + "</h1>";
  } else {
    PageArea.innerHTML = "<h1>" + document.title + "</h1>";
  }
  let NavElements = document.querySelectorAll("nav > ul > li a");
  NavElements.forEach(link => {
    if (link.parentElement.parentElement.classList[1] == "dropdownContent" && PageArea.innerHTML.includes(link.innerHTML)){
      link.classList.add("SelectedPage");
      let dropDown = link.parentElement.parentElement.parentElement.children[0];
      dropDown.classList.add("SelectedPage");
    }
    else if (PageArea.innerHTML.includes(link.innerHTML)) {
      link.classList.add("SelectedPage");
    }
  });

  //   let location = window.location.pathname.split("/");
  //   let pageName = location[location.length - 1];
  //   pageName = pageName.split(".")[0];
  //   if (pageName == "i") {
  //     PageArea.innerHTML = "<h1>Home</h1>";
  //   } else {
  //   }
})();
