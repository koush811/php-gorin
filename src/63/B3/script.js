const display = document.getElementById("display")

const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";

document.querySelector('button').addEventListener('click',()=>{
    let pass = ""

    for (let i=0 ;i<12 ;i++){
        const random = Math.floor(Math.random() * chars.length)
        pass += chars[random]
    }

    display.textContent = pass
})