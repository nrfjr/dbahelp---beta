function newyear(){
    const date = new Date();
    let currmonth = date.toLocaleString('default',{month: 'long'});

    if("January" == currmonth){
        document.getElementById("body").classList.remove("from-cyan-500");
        document.getElementById("body").classList.remove("to-indigo-500");

        document.getElementById("body").classList.add("from-sky-900");
        document.getElementById("body").classList.add("to-slate-900");

        document.getElementById("boxcont").classList.remove("box");
        for(i=1;i<=10;i++){
            document.getElementById("i"+i.toLocaleString()).classList.remove("fa-snowflake")
            document.getElementById("div"+i.toLocaleString()).classList.remove("Div"+i.toLocaleString());
            document.getElementById("div"+i.toLocaleString()).classList.add("firework");
        }
        // for(i=1;i<=5;i++){
            
        // }
    }

}   