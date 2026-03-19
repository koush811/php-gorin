const message = document.getElementById('message')
const body = document.querySelector("body")

body.addEventListener("keydown",(e)=>{
    
    if(e.key === 'Enter'){
    message.textContent = "enter"
    }else if(e.key === "Tab"){
        message.textContent = "Tab"
    }

    setTimeout(()=> {
        message.textContent = "なんか押せ"
    },2000)
    
})