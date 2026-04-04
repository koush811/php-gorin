const btn = document.querySelector('button')
const boxes = document.querySelectorAll('.box')

function Color(){
    return `rgb(
        ${Math.floor(Math.random() * 255)},
        ${Math.floor(Math.random() * 255)},
        ${Math.floor(Math.random() * 255)}
    )`
}

btn.addEventListener('click',()=>{

    boxes.forEach(box => {
        const color = Color()
        box.style.backgroundColor = color;
    });
})

