const box = document.getElementById("box")
let isDrag = false
let offsetX,offsetY

box.addEventListener("mousedown",(e)=>{
    isDrag = true

    offsetX  = e.clientX - box.offsetLeft
    offsetY = e.clientY - box.offsetTop

    box.style.cursor = "grabbing"

})

box.addEventListener("mousemove",(e)=>{
    if(!isDrag) return;

    box.style.top = `${e.clientY - offsetY}px`
    box.style.left = `${e.clientX - offsetX}px`
})

box.addEventListener("mouseup",()=>{
    isDrag = false
    box.style.cursor = "grab"
})