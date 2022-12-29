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