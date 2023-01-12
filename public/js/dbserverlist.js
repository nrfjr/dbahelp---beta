function hidemodal(){
    document.querySelector("#createmodal").classList.add("hidden");
    
    document.querySelector("#iddb").value = "";
    document.querySelector("#hostnamedb").value = "";
    document.querySelector("#ipaddressdb").value = "";
    document.querySelector("#dbversiondb").value = "";
    document.querySelector("#osdb").value = "";
    document.querySelector("#osunamedb").value = "";
    document.querySelector("#ospassdb").value = "";
    document.querySelector("#affildb").value = "";

    document.querySelector("#idapp").value = "";
    document.querySelector("#hostnameapp").value = "";
    document.querySelector("#ipaddressapp").value = "";
    document.querySelector("#osapp").value = "";
    document.querySelector("#osunameapp").value = "";
    document.querySelector("#ospassapp").value = "";
    document.querySelector("#affilapp").value = "";
    document.querySelector("#appurlapp").value = ""; 
}

function createDBmodal(){
    document.querySelector("#createmodal").classList.remove("hidden");
    document.querySelector("#APPform").classList.add("hidden");
    document.querySelector("#DBform").classList.remove("hidden");
    document.querySelector("#dbformtitle").innerHTML = "Create Database"
    document.querySelector("#conbtn").innerHTML = "Create";
}

function createAPPmodal(){
    document.querySelector("#createmodal").classList.remove("hidden");
    document.querySelector("#DBform").classList.add("hidden");
    document.querySelector("#APPform").classList.remove("hidden");
    document.querySelector("#dbformtitle").innerHTML = "Create Application";
    document.querySelector("#conbtn").innerHTML = "Create";
}

function editmodal(id,type){
    if(type.trim() == "proddb"  ){
        editDBmodal(id,"PRD");
    }else if(type.trim() ==  "prodapps"){
        editAPPSmodal(id,"PRD");
    }
    else if(type.trim() == "devdb"){
        editDBmodal(id,"DEV");
    }
    else if(type.trim() == "devapps"){
        editAPPSmodal(id,"DEV");
    }
}

function editDBmodal(id,dbtyped){
    if (dbtyped == "PRD"){
        document.querySelector("#dbtype").value = "PRD";
    }else if (dbtyped == "DEV"){
        document.querySelector("#dbtype").value = "DEV";
    }

    document.querySelector("#createmodal").classList.remove("hidden");
    document.querySelector("#APPform").classList.add("hidden");
    document.querySelector("#DBform").classList.remove("hidden");
    document.querySelector("#dbformtitle").innerHTML = "Edit Database"
    document.querySelector("#conbtn").innerHTML = "Edit"

    //get value from table first
    let hostName = document.querySelector("#Hostname"+id).innerHTML;
    let ipAdd = document.querySelector("#IP_Address"+id).innerHTML;
    let dbVersion = document.querySelector("#DB_Version"+id).innerHTML;
    let oS = document.querySelector("#OS"+id).innerHTML;
    let osUname = document.querySelector("#OS_Username"+id).innerHTML;
    let osPass = document.querySelector("#OS_Password"+id).innerHTML;
    let aFfil = document.querySelector("#Affiliation"+id).innerHTML;

    //set values to form
    document.querySelector("#iddb").value = id;
    document.querySelector("#hostnamedb").value = hostName.trim();
    document.querySelector("#ipaddressdb").value = ipAdd.trim();
    document.querySelector("#dbversiondb").value = dbVersion.trim();
    document.querySelector("#osdb").value = oS.trim();
    document.querySelector("#osunamedb").value = osUname.trim();
    document.querySelector("#ospassdb").value = osPass.trim();
    document.querySelector("#affildb").value = aFfil.trim();
}

function editAPPSmodal(id,apptyped){
    if (apptyped == "PRD"){
        document.querySelector("#apptype").value = "PRD";
    }else if (apptyped == "DEV"){
        document.querySelector("#apptype").value = "DEV";
    }

    document.querySelector("#createmodal").classList.remove("hidden");
    document.querySelector("#DBform").classList.add("hidden");
    document.querySelector("#APPform").classList.remove("hidden");
    document.querySelector("#appformtitle").innerHTML = "Edit Application"
    document.querySelector("#conbtn").innerHTML = "Edit"

    //get value from table first
    let hostName = document.querySelector("#Hostname"+id).innerHTML;
    let ipAdd = document.querySelector("#IP_Address"+id).innerHTML;
    let oS = document.querySelector("#OS"+id).innerHTML;
    let osUname = document.querySelector("#OS_Username"+id).innerHTML;
    let osPass = document.querySelector("#OS_Password"+id).innerHTML;
    let aFfil = document.querySelector("#Affiliation"+id).innerHTML;
    let appURL = document.querySelector("#Application_URL"+id).textContent;

    //set values to form
    document.querySelector("#idapp").value = id;
    document.querySelector("#hostnameapp").value = hostName.trim();
    document.querySelector("#ipaddressapp").value = ipAdd.trim();
    document.querySelector("#osapp").value = oS.trim();
    document.querySelector("#osunameapp").value = osUname.trim();
    document.querySelector("#ospassapp").value = osPass.trim();
    document.querySelector("#affilapp").value = aFfil.trim();
    document.querySelector("#appurlapp").value = appURL.trim();
}