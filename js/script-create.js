// MINHAS VARIÁVEIS
let btn = document.querySelector('#verSenha')
let btnConfirm = document.querySelector('#verConfirmSenha')

let nome = document.querySelector('#nome')
let labelNome = document.querySelector('#labelNome')
let validNome = false

let email = document.querySelector('#email')
let LabelEmail = document.querySelector('#LabelEmail')
let validEmail = false

let senha = document.querySelector('#passwd')
let LabelSenha = document.querySelector('#LabelPasswd')
let validSenha = false

let confirmSenha = document.querySelector('#confirmPasswd')
let LabelConfirmSenha = document.querySelector('#LabelConfirmSenha')
let validConfirmSenha = false

let msgError = document.querySelector('#msgError')
let msgSuccess = document.querySelector('#msgSuccess')

// VALIDANDO OS DADOS INFORMADOS NO FORMULÁRIO PARA APRESENTAR CRÍTICAS NAS LABEL EM CASO DE INCONSISTÊNCIAS
nome.addEventListener('keyup', ()=>{
    if (nome.value.length <= 8){
        labelNome.setAttribute('style', 'color: red')
        labelNome.innerHTML = 'Nome * insira no mínimo nome e sobrenome.'
        nome.setAttribute('style', 'border-color: red')
        validNome = false
    } else {
        labelNome.setAttribute('style', 'color: green')
        labelNome.innerHTML = 'Nome'
        nome.setAttribute('style', 'border-color: green')
        validNome = true
    }
})

email.addEventListener('keyup', ()=>{
    if (email.value.includes('@') && email.value.includes('.')){
        labelEmail.setAttribute('style', 'color: green')
        labelEmail.innerHTML = 'Email'
        email.setAttribute('style', 'border-color: green')
        validEmail = true
    } else {
        labelEmail.setAttribute('style', 'color: red')
        labelEmail.innerHTML = 'E-mail * insira um email válido.'
        email.setAttribute('style', 'border-color: red')
        validEmail = false
    }
})

senha.addEventListener('keyup', ()=>{
    if (senha.value.length < 8){
        LabelSenha.setAttribute('style', 'color: red')
        LabelSenha.innerHTML = 'Senha * mínimo de 8 caracteres.'
        senha.setAttribute('style', 'border-color: red')
        validSenha = false
    } else {
        LabelSenha.setAttribute('style', 'color: green')
        LabelSenha.innerHTML = 'Senha'
        senha.setAttribute('style', 'border-color: green')
        validSenha = true
    }
})

confirmSenha.addEventListener('keyup', ()=>{
    if (senha.value != confirmSenha.value){
        LabelConfirmSenha.setAttribute('style', 'color: red')
        LabelConfirmSenha.innerHTML = 'Confirmar senha * As senhas não conferem.'
        confirmSenha.setAttribute('style', 'border-color: red')
        //confirmSenha.setCustomValidity("As senhas não conferem.")
        validConfirmSenha = false
    } else {
        LabelConfirmSenha.setAttribute('style', 'color: green')
        LabelConfirmSenha.innerHTML = 'Confirmar senha'
        confirmSenha.setAttribute('style', 'border-color: green')
        //confirmSenha.setCustomValidity("")
        validConfirmSenha = true
    }
})

// AÇÃO DE MOSTRAR OU ESCONDER CARACTERES DOS CAMPOS DE SENHA E CONFIRMAR SENHA
btn.addEventListener('click', ()=>{
    let inputSenha = document.querySelector('#passwd')

    if(inputSenha.getAttribute('type') == 'password'){
        inputSenha.setAttribute('type', 'text')
    } else {
        inputSenha.setAttribute('type', 'password')
    }
})

btnConfirm.addEventListener('click', ()=>{
    let inputConfirmSenha = document.querySelector('#confirmPasswd')
    
    if(inputConfirmSenha.getAttribute('type') == 'password'){
        inputConfirmSenha.setAttribute('type', 'text')
    } else {
        inputConfirmSenha.setAttribute('type', 'password')
    }
})

// VALIDANDO SE CAMPOS DO FORMULÁRIO NÃO ESTÃO EM BRANCO PARA ENVIO DOS DADOS DE CADASTRO
function cadastrar(){
    if (validNome && validEmail && validSenha && validConfirmSenha){
        msgSuccess.setAttribute('style', 'display: block')
        msgSuccess.innerHTML = '<strong>Cadastrado realizado!</strong>'
        msgError.innerHTML = ''
        msgError.setAttribute('style', 'display: none')

    } else {
        msgError.setAttribute('style', 'display: block')
        msgError.innerHTML = '<strong>E-mail informado já existe!</strong>'
        msgSuccess.innerHTML = ''
        msgSuccess.setAttribute('style', 'display: none')
    }
}