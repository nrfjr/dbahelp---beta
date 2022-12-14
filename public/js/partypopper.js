function partypopper(){
    document.querySelector("#tag-logo").classList.add("shake")
    console.log("add shake")
    document.querySelector("#tag-logo-cont").classList.add("pop")
    console.log("add pop")
    setTimeout(function(){
        document.querySelector("#tag-logo").classList.remove("shake")
        console.log("remove shake")
        document.querySelector("#tag-logo-cont").classList.remove("pop")
        console.log("remove pop")
    },3000
    )
}