// MINHAS VARIÁVEIS
let btnLogin = document.querySelector('#verSenhaLogin')

btnLogin.addEventListener('click', ()=>{
    let inputSenhaLogin = document.querySelector('#PasswdLogin')

    if(inputSenhaLogin.getAttribute('type') == 'password'){
        inputSenhaLogin.setAttribute('type', 'text')
    } else {
        inputSenhaLogin.setAttribute('type', 'password')
    }
})
