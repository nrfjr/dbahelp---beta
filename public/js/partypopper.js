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

// const runAsync = fn => {
//     const worker = new Worker(
//       URL.createObjectURL(new Blob([`postMessage((${fn})());`]), {
//         type: 'application/javascript; charset=utf-8'
//       })
//     );
//     return new Promise((res, rej) => {
//       worker.onmessage = ({ data }) => {
//         res(data), worker.terminate();
//       };
//       worker.onerror = err => {
//         rej(err), worker.terminate();
//       };
//     });
//   };
//   const partypopper = () => {
//     document.querySelector("#tag-logo").classList.add("shake")
//     console.log("add shake")
//     document.querySelector("#tag-logo-cont").classList.add("pop")
//     console.log("add pop")
//     setTimeout(function(){
//         document.querySelector("#tag-logo").classList.remove("shake")
//         console.log("remove shake")
//         document.querySelector("#tag-logo-cont").classList.remove("pop")
//         console.log("remove pop")
//     },3000
//     ) 
//   };
//   /*
//   */
// //   runAsync(partypopper).then(console.log); // 209685000000