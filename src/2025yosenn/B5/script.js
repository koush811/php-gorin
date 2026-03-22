const input = document.querySelector("input")
const lists = document.querySelectorAll(".list")

input.addEventListener("input",()=>{
    const key = input.value.toLowerCase()
    
    lists.forEach(list => {
        if(list.textContent.toLowerCase().includes(key)){
            list.style.display = "block"
        }else{
            list.style.display = "none"
        }
    });
})