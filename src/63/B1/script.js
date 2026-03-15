isStart = false
const display = document.getElementById('display')
const startbtn = document.getElementById("start")
const stopbtn = document.getElementById("stop")
const resetbtn = document.getElementById("reset")
let dev = 0
let startTime = 0
let timer

startbtn.addEventListener("click",()=>{
    if(isStart) return;
    startTime = Date.now() - dev
    isStart = true

    timer = setInterval(() => {
        dev = Date.now() - startTime

        let ms = Math.floor((dev % 1000) / 10)
        let ss = Math.floor((dev / 1000) % 60)
        let mins = Math.floor((dev / 60000))

        ms = ms.toString().padStart(2,"0")
        ss = ss.toString().padStart(2,"0")
        mins = mins.toString().padStart(2,"0")

        display.textContent = `${mins}:${ss}:${ms}`
    },10)
})

stopbtn.addEventListener('click',()=>{
    isStart = false
    clearInterval(timer)
})

resetbtn.addEventListener('click',()=>{
    isStart = false
    clearInterval(timer)
    dev = 0
    display.textContent = "00:00:00"
})

