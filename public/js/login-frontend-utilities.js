// Spinner Login JS
    function loadit(){
        let usern = document.getElementById("username").value
        let passw = document.getElementById("password").value
    
        if (usern != "" && passw != ""){ 
            document.getElementById("loadIcon").classList.remove("hidden")
        }
    }


// Dynamic Season Change Detector
    function changeSVGonSeason(){
        const spring = ["March", "April", "May"]
        const summer = ["June", "July", "August"]
        const fall = ["September", "October", "November"]
        const winter = ["December"]
        const valentine = ["February"]

        const date = new Date();
        let currmonth = date.toLocaleString('default',{month: 'long'});

        if(spring.includes(currmonth)){
            for(i=1;i<=10;i++){
                document.getElementById("i"+i.toLocaleString()).classList.add("fa-fan")
            }
        }
        else if(summer.includes(currmonth)){
            for(i=1;i<=10;i++){
                document.getElementById("i"+i.toLocaleString()).classList.add("fa-sun")
            }
        }
        else if(fall.includes(currmonth)){
            for(i=1;i<=10;i++){
                document.getElementById("i"+i.toLocaleString()).classList.add("fa-star")
            }
        }
        else if(winter.includes(currmonth)){
            for(i=1;i<=10;i++){
                document.getElementById("i"+i.toLocaleString()).classList.add("fa-snowflake")
            }
        }
        else if(valentine.includes(currmonth)){
            for(i=1;i<=10;i++){
                document.getElementById("i"+i.toLocaleString()).classList.add("fa-heart")
            }
        }
    }


// Login Greet JS
    function logingreet(){
        var i = 0;
        var txt = 'GOOD DAY DBA!'; /* The text */
        var speed = 150; /* The speed/duration of the effect in milliseconds */
    
        setTimeout(function typeWriter(){
        if (i < txt.length) {
            document.getElementById("greet").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
        }, 2000);
    }


// New Year BG
    function newyear(){
        const date = new Date();
        let currmonth = date.toLocaleString('default',{month: 'long'});

        if("January" == currmonth){
            document.getElementById("body").classList.remove("from-cyan-500");
            document.getElementById("body").classList.remove("to-indigo-500");

            document.getElementById("body").classList.add("from-sky-900");
            document.getElementById("body").classList.add("to-slate-900");

            document.getElementById("boxcont").classList.remove("box");
            for(i=1;i<=10;i++){
                document.getElementById("i"+i.toLocaleString()).classList.remove("fa-snowflake")
                document.getElementById("i"+i.toLocaleString()).classList.add("hidden")
                document.getElementById("div"+i.toLocaleString()).classList.remove("Div"+i.toLocaleString());
                document.getElementById("div"+i.toLocaleString()).classList.add("firework");
            }
        }

    }   


// login color change bg
    function colorChange() {
        const Palletes = [["#F7A4A4","#FEBE8C","#FFFBC1","#B6E2A1"],["#277BC0","#FFB200","#FFCB42","#FFF4CF"],["#FEFFDB","#FFC60B","#FF8B00","#444444"],["#EB455F","#FCFFE7","#BAD7E9","#2B3467"]   ];

        const random1 = Math.floor(Math.random() * Palletes.length);
        const random2 = Math.floor(Math.random() * Palletes.length);
        const random3 = Math.floor(Math.random() * Palletes.length);
        
        const spring = ["March", "April", "May"]
        const summer = ["June", "July", "August"]
        const fall = ["September", "October", "November"]
        const winter = ["December","January","February"]

        const date = new Date();
        let currmonth = date.toLocaleString('default',{month: 'long'});

        // console.log(Palletes[random2][random1].toString());
        // console.log(Palletes[random1][random2].toString());

        if(spring.includes(currmonth)){
            document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[0][random1].toString());
            document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[0][random3].toString());
            document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[0][random2].toString());
        }
        else if(summer.includes(currmonth)){
            document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[1][random1].toString());
            document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[1][random3].toString());
            document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[1][random2].toString());
        }
        else if(fall.includes(currmonth)){
            document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[2][random1].toString());
            document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[2][random3].toString());
            document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[2][random2].toString());
        }
        else if(winter.includes(currmonth)){
            document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[3][random1].toString());
            document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[3][random3].toString());
            document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[3][random2].toString());
        }

        
        setTimeout(colorChange, 10000)

    }


  