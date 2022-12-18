function tab1(){
    // if(document.getElementById("tabs-1").classList.contains(""))
    document.getElementById("tabs-2").classList.add("slide-out-right");
    setTimeout(function(){
      document.getElementById("tabs-2").classList.add("hidden");
      document.getElementById("tabs-1").classList.remove("hidden");
      document.getElementById("tabs-2").classList.remove("slide-in-right");
      document.getElementById("tabs-1").classList.remove("slide-out-left");
      document.getElementById("tabs-1").classList.add("slide-in-left");
    },700)
  }
  function tab2(){
    document.getElementById("tabs-1").classList.add("slide-out-left");
    setTimeout(function(){
      document.getElementById("tabs-1").classList.add("hidden");
      document.getElementById("tabs-2").classList.remove("hidden");
      document.getElementById("tabs-1").classList.remove("slide-in-left");
      document.getElementById("tabs-2").classList.remove("slide-out-right");
      document.getElementById("tabs-2").classList.add("slide-in-right");
    },700)
  }