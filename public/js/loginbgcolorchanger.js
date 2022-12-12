function colorChange() {
    const Palletes = [["#F7F6CF#", "#B6D8F2", "#F4CFDF", "#5784BA", "#9AC8EB"],["#DDF2F4", "#84A6D6", "#4382BB", "#E4CEE0", "#A15D98"],["#F5BFD2", "#E5DB9C", "#D0BCAC", "#BEB4C5", "#E6A57E"],["#218B82", "#9AD9DB", "#E5DBD9", "#98D4BB", "#EB96AA"],["#B8E0F6", "#A4CCE3", "#37667E", "#DEC4D6", "#7B92AA"]];

    const random1 = Math.floor(Math.random() * Palletes.length);
    const random2 = Math.floor(Math.random() * Palletes.length);
    const random3 = Math.floor(Math.random() * Palletes.length);


    // console.log(Palletes[random2][random1].toString());
    // console.log(Palletes[random1][random2].toString());


    document.querySelectorAll(".even").forEach(el => el.style.backgroundColor = Palletes[random2][random1].toString());
    document.querySelectorAll(".odd").forEach(el => el.style.backgroundColor = Palletes[random1][random3].toString());
    document.querySelectorAll(".extra").forEach(el => el.style.backgroundColor = Palletes[random3][random2].toString());

}