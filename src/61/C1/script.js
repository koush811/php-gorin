const text = document.getElementById('text')
const button = document.querySelector('button')
const input = document.querySelector("input")

function Color(){
    return`
        rgb(
            ${Math.floor(Math.random()*255)},
            ${Math.floor(Math.random()*255)},
            ${Math.floor(Math.random()*255)}
        )
    `
}

button.addEventListener("click",()=>{

    const word = input.value

    let origintext = text.textContent

    if(word === "")return

    const regex = new RegExp(word,"g")

    const hilight = origintext.replace(regex,(match)=>{
        const color = Color();
        return `<span style="background-color = ${color}">${match}<span>`
    }) 

    text.innerHTML = hilight;
})
