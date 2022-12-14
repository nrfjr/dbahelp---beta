
function logingreet(){
  var i = 0;
  var txt = 'GOOD DAY DBA!'; /* The text */
  var speed = 150; /* The speed/duration of the effect in milliseconds */

  // function typeWriter() {
  //   if (i < txt.length) {
  //     document.getElementById("greet").innerHTML += txt.charAt(i);
  //     i++;
  //     setTimeout(typeWriter, speed);
  //   }
  // }
  setTimeout(function typeWriter(){
    if (i < txt.length) {
      document.getElementById("greet").innerHTML += txt.charAt(i);
      i++;
      setTimeout(typeWriter, speed);
    }
  }, 2000);
}
