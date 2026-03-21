const body = document.querySelector("body")

body.addEventListener("mousemove",(e)=>{
    const clientX = e.clientX
    const clientY = e.clientY

    const width = window.innerWidth
    const height = window.innerHeight

    const x = Math.floor((clientX / width)*255)
    const y = Math.floor((clientY / height)*255)

    body.style.backgroundColor = `rgb(${x},${y},255)`
})