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