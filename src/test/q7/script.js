const form = document.getElementById('form')
const result = document.getElementById('result')
const resetbtn = document.querySelector('button')

const questions = [
    {
        text:"HTMLで最も大きい見出しを表す要素はどれですか。",
        answer: "B",
        options: [
            {key: "A", text:"&lt;heading&gt"},
            {key: "B", text:"&lt;heading&gt;"},
            {key: "C", text:"&lt;heading&gt;"},
            {key: "D", text:"&lt;heading&gt;"},
        ],
    },
    {
        text: "CSSで文字色を指定するプロパティはどれですか。",
        answer: "C",
        options: [
            {key: "A", text:"font-color"},
            {key: "B", text:"text-color"},
            {key: "C", text:"color"},
            {key: "D", text:"foreground"},
        ],
    },
    {
        text: "JavaScriptで配列の末尾に要素を追加するメソッドはどれですか。",
        answer: "C",
        options: [
            {key: "A", text:"add()"},
            {key: "B", text:"append()"},
            {key: "C", text:"push()"},
            {key: "D", text:"insert()"},
        ],
    },
    {
        text: "PHPで連想配列をJSON文字列に変換する関数はどれですか。",
        answer: "D",
        options: [
            {key: "A", text:"json_parse()"},
            {key: "B", text:"json_decose()"},
            {key: "C", text:"array_to_join()"},
            {key: "D", text:"json_encode()"},
        ],
    },
    {
        text: "Webページで外部CSSファイルを読み込む要素はどれですか。",
        answer: "C",
        options: [
            {key: "A", text:"&lt;script>&gt;"},
            {key: "B", text:"&ltstyle&gt;"},
            {key: "C", text:"&ltlink&gt;"},
            {key: "D", text:"&ltmeta&gt;"},
        ],
    }
]

function render(){
    let html = ""

    questions.forEach((question,id) => {
        
        html += `<h2>${id + 1}:${question.text}</h2>`

        question.options.forEach((option) => {
            html += `
                <label>
                    <input type="radio" name="question-${id}" value="${option.key}">
                    <span>${option.key}.${option.text}</span>
                </label>
            `
        })

        html += `</section>`

    })

    html += `<button type="submit">送信</button>`

    form.innerHTML = html;
    
}

form.addEventListener('submit', (e) => {
    e.preventDefault()

    let score = 0

    questions.forEach((question,id)=>{
        const selected = form.querySelector(`input[name="question-${id}"]:checked`) 
        if(selected.value === question.answer){
            score += 1
        }
    })

    result.textContent = `${questions.length}問中 ${score}問正解です。`
})

resetbtn.addEventListener('click', () => {
    form.reset()
    result.textContent = ''
})

render()