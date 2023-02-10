function tset(){
    const targetSga = document.querySelector("#row").innerHTML
    console.log(targetSga)
}
// FORMULA : ((current-new)/current)*100
function getpercentage(targetsgarow,targetphyread){
    const curphyRead = parseInt(document.querySelector("#preads1").innerHTML)
    
    const targetPhyRead = parseInt(targetphyread);

    const percentage = ((curphyRead-targetPhyRead)/curphyRead)*100

    // console.log(percentage.toFixed(3))


    //rows
    //resetting the border styles of all TR
    document.querySelectorAll("tr").forEach(el => el.style.border = "0px solid black");
    const curSga = document.querySelector("#sga_row1")

    const targetSga = document.getElementById(targetsgarow.toString())
    
    //applying focus border on the involved rows for calculations
    curSga.style.border = "2px solid black";
    targetSga.style.border = "2px solid black";

    let gaindisp = document.querySelector("#gaindisplay")
    let gaindispcont = document.querySelector("#gaindisplay-cont")

    gaindisp.innerHTML = percentage.toFixed(2)+"%"; 
    gaindispcont.classList.remove("hidden");
    

}