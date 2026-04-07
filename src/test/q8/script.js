const input = document.querySelector('input')
const lengthText = document.getElementById('length')
const bigText = document.getElementById('big')
const smallText = document.getElementById('small')
const numText = document.getElementById('number')
const markText = document.getElementById('mark')
const spaceText = document.getElementById('space')
const result = document.getElementById('result')

input.addEventListener('input',()=>{
    check()
})

function check(){
    const value = input.value
    if(value.length < 8 ){
        lengthText.textContent = "8文字以上にしてください"
    }else if(value.length > 16){
        lengthText.textContent = "16文字以下にしてください"
    }else{
        lengthText.textContent = "OK"
    }

    if(!/[A-Z]/.test(value)){
        bigText.textContent = "大文字を含めてください"
    }else{
        bigText.textContent = "OK"
    }

    if(!/[a-z]/.test(value)){
        smallText.textContent = "小文字を含めてください"
    }else{
        smallText.textContent = "OK"
    }

    if(!/[0-9]/.test(value)){
        numText.textContent = "数字を含めてください"
    }else{
        numText.textContent = "OK"
    }

    if(!/[^A-Za-z0-9\s]/.test(value)){
        markText.textContent = "記号を含めてください"
    }else{
        markText.textContent = "OK"
    }

    if(/\s/.test(value)){
        spaceText.textContent = "スペースを含めないでください"
    }else{
        spaceText.textContent = "OK"
    }

    if(lengthText.textContent === "OK" && bigText.textContent === "OK" && smallText.textContent === "OK" && numText.textContent === "OK" && markText.textContent === "OK" && spaceText.textContent === "OK" ){
        result.textContent = "条件クリア"
    }else{
        result.textContent = "条件を満たしていません"
    }
}