(function () {
  let PageArea = document.querySelector(".CurrentPage");
  if (document.title.includes("||")) {
    PageArea.innerHTML = "<h1>" + document.title.split("||")[1] + "</h1>";
  } else {
    PageArea.innerHTML = "<h1>" + document.title + "</h1>";
  }

  //   let location = window.location.pathname.split("/");
  //   let pageName = location[location.length - 1];
  //   pageName = pageName.split(".")[0];
  //   if (pageName == "i") {
  //     PageArea.innerHTML = "<h1>Home</h1>";
  //   } else {
  //   }
})();
