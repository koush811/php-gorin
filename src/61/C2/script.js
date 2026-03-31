const content = document.querySelector(".content")
const cursor = document.querySelector(".cursor")

let size = 100;
const minsize = 10;

cursor.style.width = size + "px"
cursor.style.height = size + "px"

content.addEventListener("mousemove",(e)=>{
    cursor.style.top = e.clientY + "px"
    cursor.style.left = e.clientX + "px" 
})

content.addEventListener("wheel",(e)=>{
    if(e.deltaY > 0){
        size -= 10;
    }else{
        size += 10
    }

    if(size < minsize){
        size = minsize
    }

    cursor.style.width = size + "px"
    cursor.style.height = size + "px"
})

