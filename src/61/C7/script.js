const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

let x = 0;
const y = 50
const radius = 20

function draw() {
    ctx.clearRect(0,0,canvas.width,canvas.height);

    ctx.beginPath();
    ctx.arc(x,y,radius,0,Math.PI*2)
    ctx.fillStyle = "green"
    ctx.fill()

    x+=2;
    if(x>canvas.width + radius){
        x = -radius
    }

    requestAnimationFrame(draw)
    
}

draw()

