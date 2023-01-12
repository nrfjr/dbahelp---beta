function hidemodal(){
    document.querySelector("#createmodal").classList.add("hidden");
    
    //resets the inputs value in dbform upon clicking cancel
    document.querySelector("#iddb").value = "";
    document.querySelector("#hostnamedb").value = "";
    document.querySelector("#ipaddressdb").value = "";
    document.querySelector("#dbversiondb").value = "";
    document.querySelector("#osdb").value = "";
    document.querySelector("#osunamedb").value = "";
    document.querySelector("#ospassdb").value = "";
    document.querySelector("#affildb").value = "";
    //resets the inputs value in appform upon clicking cancel
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
    document.querySelector("#createmodal").classList.remove("hidden");//shows modal
    document.querySelector("#APPform").classList.add("hidden");//hides appform 
    document.querySelector("#DBform").classList.remove("hidden");//shows dbform 
    document.querySelector("#dbformtitle").innerHTML = "Create Database";//replace title text
    document.querySelector("#conbtndb").innerHTML = "Create";//replace confirm btn text
}

function createAPPmodal(){
    document.querySelector("#createmodal").classList.remove("hidden");//shows modal
    document.querySelector("#DBform").classList.add("hidden");//hides dbform
    document.querySelector("#APPform").classList.remove("hidden");//shows appform
    document.querySelector("#dbformtitle").innerHTML = "Create Application";//replace title text
    document.querySelector("#conbtnapp").innerHTML = "Create";//replace confirm btn text
    document.querySelector("#appurlapp").value = "http://"
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
        document.querySelector("#dbtype").value = "PRD";//sets the value of <select> if dbtyped is PRD
    }else if (dbtyped == "DEV"){
        document.querySelector("#dbtype").value = "DEV";//sets the value of <select> if dbtyped is DEV
    }

    document.querySelector("#createmodal").classList.remove("hidden");//shows modal
    document.querySelector("#APPform").classList.add("hidden");//hide appform
    document.querySelector("#DBform").classList.remove("hidden");//shows dbform
    document.querySelector("#dbformtitle").innerHTML = "Edit Database";//replace title text
    document.querySelector("#conbtndb").innerHTML = "Edit";//replace confirm btn text

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
        document.querySelector("#apptype").value = "PRD";//sets the value of <select> if apptyped is PRD
    }else if (apptyped == "DEV"){
        document.querySelector("#apptype").value = "DEV";//sets the value of <select> if apptyped is DEV
    }

    document.querySelector("#createmodal").classList.remove("hidden");//shows modal
    document.querySelector("#DBform").classList.add("hidden");//hide dbform
    document.querySelector("#APPform").classList.remove("hidden");//shows appform
    document.querySelector("#appformtitle").innerHTML = "Edit Application";//replace title text
    document.querySelector("#conbtnapp").innerHTML = "Edit";//replace confirm btn text

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