const body = document.querySelector("body")

body.addEventListener("mousemove",(e)=>{
    x = e.clientX
    y = e.clientY

    body.style.backgroundColor = `rgb(${x},${y},256)`
})