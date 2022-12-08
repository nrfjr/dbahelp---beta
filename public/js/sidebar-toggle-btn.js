function getAria(){
    let sidebtnAria = document.getElementById('sidenavbtn').getAttribute('aria-expanded')
    console.log(sidebtnAria)

    if(sidebtnAria == "false"){
        document.getElementById("chevron").classList.remove('fa-chevron-down');
        document.getElementById("chevron").classList.add('fa-chevron-up');
    }else if(sidebtnAria == "true"){
        document.getElementById("chevron").classList.remove('fa-chevron-up');
        document.getElementById("chevron").classList.add('fa-chevron-down');
    }
}
