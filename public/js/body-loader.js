$(window).on('load',function(){
    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
    setTimeout(function(){
        document.getElementById("loaderz").classList.add("hidden");
    },1000)
})