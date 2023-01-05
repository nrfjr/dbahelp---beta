function bannerColor(color1,color2){
    document.getElementById("banner").classList.remove("hidden")
    document.getElementById("banner").classList.remove("bg-gradient-to-r")
    document.getElementById("banner").classList.remove("from-gray-400")
    document.getElementById("banner").classList.remove("to-gray-900")
    document.getElementById("banner").style.background = "linear-gradient(90deg, "+color1.toLocaleString()+", "+color2.toLocaleString()+")";
}

//Banner Use
let bcolor1; //global variable for color gradient 1
let bcolor2; //global variable for color gradient 1

//Banner Use
//function for the color option button in the addTodomodal
function getColor(color1,color2){
    bcolor1 = color1;
    bcolor2 = color2;
    document.getElementById("colorIcon").style.background = "linear-gradient(90deg, "+color1.toLocaleString()+", "+color2.toLocaleString()+")";
    // console.log(todoColor1,todoColor2)
    
    saveColor(bcolor1,bcolor2);
    
}

const getColors = () => {
    let colors;//the array, this is our local database
    if(localStorage.getItem('colors') === null){
        colors = [];
    }else {
        colors = JSON.parse(localStorage.getItem('colors'));
    }
    return colors;
}

const saveColor = (Color1,Color2) => {
    const colors = getColors();
    colors.push(Color1,Color2);
    localStorage.setItem(0, JSON.stringify(colors));
    console.log(colors);
    applyColor();
}

const applyColor = () => {
    const list = JSON.parse(localStorage.getItem(0));
    // console.log(list[0].toLocaleString(),list[1].toLocaleString());
    if(list.length > 0){
        document.querySelector("#defaultimage").classList.add("hidden");
        document.querySelector("#banner").classList.remove("hidden","bg-gradient-to-r","from-gray-400","to-gray-900");
        document.querySelector("#banner").style.background = "linear-gradient(90deg, "+list[0].toLocaleString()+", "+list[1].toLocaleString()+")";
    }
}