const input = document.querySelector('input')
const result = document.getElementById('display')
const btn = document.querySelector('button')

btn.addEventListener('click',()=>{
    const value = input.value.trim()

    if(/^#([0-9a-fA-F]{6}$)/.test(value)){
        const r  = parseInt(value.substring(1,3),16);
        const g  = parseInt(value.substring(3,5),16);
        const b  = parseInt(value.substring(5,7),16);

        result.textContent = `RGB(${r},${g},${b})`
    }else if(/^rgb\(\s*\d{1,3},\s*\d{1,3},\s*\d{1,3}\s*\)$/.test(value)){
        const nums = value.match(/\d+/g).map(Number)

        if(nums.some(n => n>255)){
            result.textContent = "エラー"
            return;
        }

        const hex = nums.map(n => 
            n.toString(16).padStart(2,"0")
        ).join("")

        result.textContent = `#${hex}`
    }else{
        result.textContent = "エラー"
    }

})