// DBSTATS_TABSLIDE
    function tab1(){
        // if(document.getElementById("tabs-1").classList.contains(""))
        document.getElementById("tabs-2").classList.add("slide-out-right");

        document.getElementById("tabbtn1").classList.remove("bg-gray-400");
        document.getElementById("tabbtn1").classList.add("bg-gray-800", "outline-none", "ring", "ring-gray-400", "z-10", "text-white");
        document.getElementById("tabbtn2").classList.remove("bg-gray-800", "outline-none", "ring", "ring-gray-400", "z-10", "text-white");
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
        document.getElementById("tabbtn2").classList.add("bg-gray-800", "outline-none", "ring", "ring-gray-400", "z-10", "text-white");
        document.getElementById("tabbtn1").classList.remove("bg-gray-800", "outline-none", "ring", "ring-gray-400", "z-10", "text-white");
        document.getElementById("tabbtn1").classList.add("bg-gray-400");

        setTimeout(function(){
        document.getElementById("tabs-1").classList.add("hidden");
        document.getElementById("tabs-2").classList.remove("hidden");
        document.getElementById("tabs-1").classList.remove("slide-in-left");
        document.getElementById("tabs-2").classList.remove("slide-out-right");
        document.getElementById("tabs-2").classList.add("slide-in-right");
        },400)
    }



// Delete ArchiveModals show/close modal func
    function delArchiveModalShow(){
        document.getElementById("delArchivemodal").classList.remove("hidden");
    }

    function delArchiveModalClose(){
        document.getElementById("delArchivemodal").classList.add("hidden");
    }

    function delArchiveModalSuccessShow(){
        document.getElementById("confirmDelArc").classList.add("hidden");
        document.getElementById("successDelArc").classList.remove("hidden");
    }

    function successdelArchiveModalClose(){
        document.getElementById("delArchivemodal").classList.add("hidden");
        document.getElementById("successDelArc").classList.add("hidden");
        document.getElementById("confirmDelArc").classList.remove("hidden");
    }



// Redo Log Zoom
    function showPopAM(){
        document.getElementById("redologAMZoom").classList.remove("hidden");
    }
    function showPopPM(){
        document.getElementById("redologPMZoom").classList.remove("hidden");
    }
    function hidePopAM(){
        document.getElementById("redologAMZoom").classList.add("hidden");
    }
    function hidePopPM(){
        document.getElementById("redologPMZoom").classList.add("hidden");
    }


// Profile Banner
    //Banner Use
    //function for the color option button in the addTodomodal
    function getColor(deg,color1,color2){
        document.getElementById("colorIcon").style.background = "linear-gradient("+deg.toLocaleString()+", "+color1.toLocaleString()+", "+color2.toLocaleString()+")";
        // console.log(todoColor1,todoColor2)

        saveColor(deg.toLocaleString(),color1.toLocaleString(),color2.toLocaleString());

    }

    const getColors = () => {
        let colors;//the array, this is our local database
        if(localStorage.getItem('colors') === null){
            colors = [];
        }else {
            colors = JSON.parse(localStorage.getItem('colors'));
        }
        return colors;
    }

    const saveColor = (Deg,Color1,Color2) => {
        const colors = getColors();
        //console.log(colors);
        colors.push(Deg,Color1,Color2);
        localStorage.setItem(0, JSON.stringify(colors));
        // console.log(colors);
        applyColor();
    }

    const applyColor = () => {
        const list = JSON.parse(localStorage.getItem(0));
        //console.log(list[0].toLocaleString(),list[1].toLocaleString());
        if(list.length > 0){
            document.querySelector("#defaultimage").classList.add("hidden");
            document.querySelector("#banner").classList.remove("hidden","bg-gradient-to-r","from-gray-400","to-gray-900");
            document.querySelector("#banner").style.background = "linear-gradient("+list[0].toLocaleString()+", "+list[1].toLocaleString()+", "+list[2].toLocaleString()+")";
        }
    }


// Sidebar-Toggle-btn
    function getAria(){
        let sidebtnAria = document.getElementById('sidenavbtn').getAttribute('aria-expanded')

        if(sidebtnAria == "false"){
            document.getElementById("chevron").classList.remove('fa-chevron-down');
            document.getElementById("chevron").classList.add('fa-chevron-up');
        }else if(sidebtnAria == "true"){
            document.getElementById("chevron").classList.remove('fa-chevron-up');
            document.getElementById("chevron").classList.add('fa-chevron-down');
        }
    }
