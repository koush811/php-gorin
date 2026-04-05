

isStart = false
const display = document.getElementById('display')
const startbtn = document.getElementById("start")
const stopbtn = document.getElementById("stop")
time = 10
let timer

startbtn.addEventListener("click",()=>{
    if(isStart) return;
    isStart = true

    timer = setInterval(() => {
        time = time-1
        display.textContent = time
        console.log(time)
        if(time<5){
            display.style.color = "red"
        }
        
        if(time<1){
            display.textContent = "完了"
            isStart = false
            clearInterval(timer)
        }
        
    },1000)


})

stopbtn.addEventListener('click',()=>{
    isStart = false
    clearInterval(timer)
})

