function navToggle() {
    var x = document.getElementById("myNav");

    if (x.style.display === "none") {
      x.style.display = "block";
      if(window.matchMedia("(min-width: 768px)")){
        x.style.position = "relative";
      }else{
        x.style.position = "fixed";
      }
    } else{
      x.style.display = "none";
      // if(window.matchMedia("(min-width: 768px)")){
      //   x.style.position = "relative;"
      // }else{
      //   x.style.position = "fixed";
      // }
    }
  

  
  }
