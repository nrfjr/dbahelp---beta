function tab1(){
    // if(document.getElementById("tabs-1").classList.contains(""))
    document.getElementById("tabs-2").classList.add("slide-out-right");

    document.getElementById("tabbtn1").classList.remove("bg-gray-400");
    document.getElementById("tabbtn1").classList.add("bg-gray-800", "outline-none", "ring", "ring-violet-300", "z-10", "text-white");
    document.getElementById("tabbtn2").classList.remove("bg-gray-800", "outline-none", "ring", "ring-violet-300", "z-10", "text-white");
    document.getElementById("tabbtn2").classList.add("bg-gray-400");

    setTimeout(function(){
      document.getElementById("tabs-2").classList.add("hidden");
      document.getElementById("tabs-1").classList.remove("hidden");
      document.getElementById("tabs-2").classList.remove("slide-in-right");
      document.getElementById("tabs-1").classList.remove("slide-out-left");
      document.getElementById("tabs-1").classList.add("slide-in-left");
    },400)
  }
  function tab2(){
    document.getElementById("tabs-1").classList.add("slide-out-left");

    document.getElementById("tabbtn2").classList.remove("bg-gray-400");
    document.getElementById("tabbtn2").classList.add("bg-gray-800", "outline-none", "ring", "ring-violet-300", "z-10", "text-white");
    document.getElementById("tabbtn1").classList.remove("bg-gray-800", "outline-none", "ring", "ring-violet-300", "z-10", "text-white");
    document.getElementById("tabbtn1").classList.add("bg-gray-400");

    setTimeout(function(){
      document.getElementById("tabs-1").classList.add("hidden");
      document.getElementById("tabs-2").classList.remove("hidden");
      document.getElementById("tabs-1").classList.remove("slide-in-left");
      document.getElementById("tabs-2").classList.remove("slide-out-right");
      document.getElementById("tabs-2").classList.add("slide-in-right");
    },400)
  }