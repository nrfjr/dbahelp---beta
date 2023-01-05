//Banner Use
//function for the color option button in the addTodomodal
function getColor(deg,color1,color2){
    document.getElementById("colorIcon").style.background = "linear-gradient("+deg.toLocaleString()+", "+color1.toLocaleString()+", "+color2.toLocaleString()+")";
    // console.log(todoColor1,todoColor2)

    saveColor(deg.toLocaleString(),color1.toLocaleString(),color2.toLocaleString());

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

const saveColor = (Deg,Color1,Color2) => {
    const colors = getColors();
    console.log(colors);
    colors.push(Deg,Color1,Color2);
    localStorage.setItem(0, JSON.stringify(colors));
    // console.log(colors);
    applyColor();
}

const applyColor = () => {
    const list = JSON.parse(localStorage.getItem(0));
    // console.log(list[0].toLocaleString(),list[1].toLocaleString());
    if(list.length > 0){
        document.querySelector("#defaultimage").classList.add("hidden");
        document.querySelector("#banner").classList.remove("hidden","bg-gradient-to-r","from-gray-400","to-gray-900");
        document.querySelector("#banner").style.background = "linear-gradient("+list[0].toLocaleString()+", "+list[1].toLocaleString()+", "+list[2].toLocaleString()+")";
    }
}
