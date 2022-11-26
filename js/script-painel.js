'use strict'

const openModal = () => document.getElementById('modal')
    .classList.add('active')

const closeModal = () => document.getElementById('modal')
    .classList.remove('active')

document.getElementById('cadastrarCliente')
    .addEventListener('click', openModal)

document.getElementById('modalClose')
    .addEventListener('click', closeModal)

document.getElementById('modalClose2')
    .addEventListener('click', closeModal)

document.getElementById('apagarTudo')
    .addEventListener('click', window.location.href = 'http://localhost/pacientes/del-pacientes.php')

function apagarTudo(){
    window.location.href = "http://localhost/pacientes/del-pacientes.php";
}


