const next = document.getElementById("next");
const prev = document.getElementById("prev")
dev = 1

next.addEventListener('click',()=>{
    if(dev == 3){
        dev = 1
    }else{
        dev++
    }
    img()
    console.log(dev)
})

prev.addEventListener('click',()=>{
    if(dev == 1){
        dev = 3
    }else{
        dev--
    }
    img()
    console.log(dev)
})

function img(){
    if(dev == 1){
        document.getElementById('img').innerHTML = '<img src="images/スクリーンショット (12).png" alt="">'
    }else if(dev == 2){
        document.getElementById('img').innerHTML = '<img src="images/スクリーンショット (13).png" alt="">'
    }else{
        document.getElementById('img').innerHTML = '<img src="images/スクリーンショット (14).png" alt="">'
    }
}

img()

