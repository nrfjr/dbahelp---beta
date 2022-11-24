function navToggle() {
    var x = document.getElementById("myNav");
  if (x.style.display === "none") {
    x.style.display = "block";
    x.style.position = "fixed";
  } else {
    x.style.display = "none";
    x.style.position = "relative";
  }
  }