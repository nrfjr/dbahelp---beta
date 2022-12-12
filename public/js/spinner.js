function loadit(){
    let usern = document.getElementById("username").value
    let passw = document.getElementById("password").value
  
    if (usern != "" && passw != ""){ 
        document.getElementById("loadIcon").classList.remove("hidden")
    }
  }