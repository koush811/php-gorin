const text = document.getElementById('text')
const hero = document.querySelector('.hero')

hero.addEventListener('mousemove',(e)=>{
    let x = e.offsetX - (hero.clientWidth * 0.5)
    let y = e.offsetY - (hero.clientHeight * 0.5)
   
    text.style.textShadow = `${x}px ${y}px 0px red, ${-x}px ${-y}px 0px yellow`
})
