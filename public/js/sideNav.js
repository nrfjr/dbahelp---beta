function layoutfixer(){
  if(window.matchMedia("(min-width: 768px)").matches){
      document.querySelector("#myNav").classList.remove("scale-out-hor-left");
      document.querySelector("#myNav").classList.add("scale-in-hor-left");
      //show
      document.querySelector("#myNav").style.display = "block";
      setTimeout(function(){
        //to relative if screen is > 768px width
        document.querySelector("#myNav").style.position = "relative";
      },500)
  }else{
    //to absolute if screen is < 768px width
    document.querySelector("#myNav").style.position = "absolute";
  }
}
window.onresize = layoutfixer;

function navToggle() {
    var x = document.getElementById("myNav");

    if (x.style.display === "none") {
      // x.style.position = "absolute"; //just comment this 
      x.classList.remove("scale-out-hor-left");
      x.classList.add("scale-in-hor-left");
      //show
      x.style.display = "block";
      setTimeout(function(){
        if(window.matchMedia("(min-width: 768px)").matches){
          //to relative if screen is > 768px width
          x.style.position = "relative";
        }else{
          //to absolute if screen is < 768px width
          x.style.position = "absolute";
        }
      },500)
      
    } else{
      x.classList.add("scale-out-hor-left");
      x.classList.remove("scale-in-hor-left");
      // x.style.position = "absolute"; //just comment this 
      setTimeout(function(){
        //hide
        x.style.display = "none";
        
        if(window.matchMedia("(min-width: 768px)")){
          //to relative if screen is > 768px width
          x.style.position = "relative;"
        }else{
          //to absolute if screen is < 768px width
          x.style.position = "absolute";
        }
      },500)
      
    }
  }

  // let snvbtn = document.querySelector("#sideNavbtn");
  // let sideBar = document.querySelector("#myNav");

  // if(window.matchMedia("(min-width: 768px)").matches  && sideBar.style.display === "none" ){
  //   alert("appear")
  //   snvbtn.style.display = "block";
  // }

document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

var xDown = null;                                                        
var yDown = null;

function getTouches(evt) {
  return evt.touches ||             // browser API
         evt.originalEvent.touches; // jQuery
}                                                     
                                                                         
function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];                                      
    xDown = firstTouch.clientX;                                      
    yDown = firstTouch.clientY;                                      
};                                                
                                                                         
function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    var y = document.getElementById("myNav");
                                                                         
    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
          y.classList.add("scale-out-hor-left");
          y.classList.remove("scale-in-hor-left");
          setTimeout(function(){
            //hide
            y.style.display = "none";
            // if(window.matchMedia("(min-width: 768px)")){
            //   //to relative if screen is > 768px width
            //   y.style.position = "relative;"
            // }else{
            //   //to absolute if screen is < 768px width
            //   y.style.position = "absolute";
            // }
          },500)
        } else {
          y.classList.remove("scale-out-hor-left");
          y.classList.add("scale-in-hor-left");
          setTimeout(function(){
            //show
            y.style.display = "block";
            // if(window.matchMedia("(min-width: 768px)").matches){
            //   //to relative if screen is > 768px width
            //   y.style.position = "relative";
            // }else{
            //   //to absolute if screen is < 768px width
            //   y.style.position = "absolute";
            // }
          },500)
          
        }                       
    } else {
        if ( yDiff > 0 ) {
            /* down swipe */ 
        } else { 
            /* up swipe */
        }                                                                 
    }
    /* reset values */
    xDown = null;
    yDown = null;                                             
};
