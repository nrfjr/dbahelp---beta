// FORMULA : ((current-new)/current)*100
function getpercentage(targetsgarow,targetphyread){
    const curphyRead = parseInt(document.querySelector("#preads1").innerHTML)
    
    const targetPhyRead = parseInt(targetphyread);

    const percentage = ((curphyRead-targetPhyRead)/curphyRead)*100
        // (((curphyRead+targetPhyRead) - curphyRead)/curphyRead)*100
    // console.log(percentage.toFixed(3))


    //rows
    //resetting the border styles of all TR
    document.querySelectorAll("tr").forEach(el => el.classList.remove("bg-gray-100","bg-gray-700"));
    const curSga = document.querySelector("#sga_row1")

    const targetSga = document.getElementById(targetsgarow.toString())
    
    //applying focus border on the involved rows for calculations
    curSga.classList.add("bg-gray-400");
    targetSga.classList.add("bg-gray-700");

    let gaindisp = document.querySelector("#gaindisplay")
    let gaindispcont = document.querySelector("#gaindisplay-cont")

    if(percentage>0){
        gaindisp.classList.remove("text-red-500")
        gaindisp.classList.add("text-green-500")
    }else if(percentage<0){
        gaindisp.classList.remove("text-green-500")
        gaindisp.classList.add("text-red-500")
    }else if(percentage == 0){
        gaindisp.classList.remove("text-green-500")
        gaindisp.classList.remove("text-red-500")
    }

    gaindisp.innerHTML = percentage.toFixed(2)+"%"; 
    gaindispcont.classList.remove("hidden");
}
