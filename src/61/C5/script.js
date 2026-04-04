const text = document.querySelector('.text')
const btn = document.querySelector('button')
const back = document.querySelector('.back')

btn.addEventListener('click',()=>{
    if(text.textContent === "ライトモード"){
        back.style.backgroundColor = "black"
        text.style.color = "white"
        text.textContent = "ナイトモード"
    }else if(text.textContent === "ナイトモード"){
        back.style.backgroundColor = "white"
        text.style.color = "black"
        text.textContent = "ライトモード"
    }
})