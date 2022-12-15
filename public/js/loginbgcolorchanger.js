function colorChange() {
    const Palletes = [["#F7A4A4","#FEBE8C","#FFFBC1","#B6E2A1"],["#277BC0","#FFB200","#FFCB42","#FFF4CF"],["#FEFFDB","#FFC60B","#FF8B00","#444444"],["#EB455F","#FCFFE7","#BAD7E9","#2B3467"]   ];

    const random1 = Math.floor(Math.random() * Palletes.length);
    const random2 = Math.floor(Math.random() * Palletes.length);
    const random3 = Math.floor(Math.random() * Palletes.length);
    
    const spring = ["March", "April", "May"]
    const summer = ["June", "July", "August"]
    const fall = ["September", "October", "November"]
    const winter = ["December","February"]

    const date = new Date();
    let currmonth = date.toLocaleString('default',{month: 'long'});

    // console.log(Palletes[random2][random1].toString());
    // console.log(Palletes[random1][random2].toString());

    if(spring.includes(currmonth)){
        document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[0][random1].toString());
        document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[0][random3].toString());
        document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[0][random2].toString());
    }
    else if(summer.includes(currmonth)){
        document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[1][random1].toString());
        document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[1][random3].toString());
        document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[1][random2].toString());
    }
    else if(fall.includes(currmonth)){
        document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[2][random1].toString());
        document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[2][random3].toString());
        document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[2][random2].toString());
    }
    else if(winter.includes(currmonth)){
        document.querySelectorAll(".even").forEach(el => el.style.color = Palletes[3][random1].toString());
        document.querySelectorAll(".odd").forEach(el => el.style.color = Palletes[3][random3].toString());
        document.querySelectorAll(".extra").forEach(el => el.style.color = Palletes[3][random2].toString());
    }
    
    setTimeout(colorChange, 10000)

}
// colorChange()

// function durationChange(){
//     const randomdur1 = Math.random() * (16 - 5) + 5;
//     const randomdur2 = Math.random() * (16 - 5) + 5;
//     const randomdur3 = Math.random() * (16 - 5) + 5;

//     // console.log(randomdur1.toFixed().toString()+"s");
//     // console.log(randomdur2.toFixed().toString()+"s");
//     // console.log(randomdur3.toFixed().toString()+"s");

//     document.querySelectorAll(".Even").forEach(el => el.style.animationDuration = randomdur1.toFixed()+ "s");
//     document.querySelectorAll(".Odd").forEach(el => el.style.animationDuration = randomdur2.toFixed()+ "s");
//     document.querySelectorAll(".Extra").forEach(el => el.style.animationDuration = randomdur3.toFixed()+ "s");

//     setTimeout(durationChange, 10000)

    
// }
// durationChange()\

