/***ESTE ARCHIVO MANEJA LA FUNCIONALIDAD DEL MODULO DE PERSONAL: EDITAR Y ELIMINAR */

import { makeRequest } from "../lib.js";

let id;

const editPersonalButtons = document.querySelectorAll('.edit-personal-modal');
const deletePersonalButtons = document.querySelectorAll('.delete-personal-modal');
const buttonSubmit = document.querySelector('button#update');
const buttonDelete = document.querySelector('button#delete');

const formElement = document.querySelector('div.modal.fade form');

const personalElement = formElement.querySelector(`#personal_id`);
const nombreElement = formElement.querySelector(`#nombre`);
const cargoElement = formElement.querySelector(`#cargo`);

const initFormData = async () => {
  editPersonalButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');

      completePersonalData();
    })
  })

  deletePersonalButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');
    })
  })
}

const completePersonalData = async () => {
  const { nombre, cargo } = await makeRequest('personal/get.php', {
      params: {
        id
      }
    });

  nombreElement.value = nombre;
  cargoElement.value = cargo;
}

buttonSubmit.addEventListener('click', (event) => {
  event.preventDefault()
  
  const body = {
    nombre: nombreElement.value,
    cargo: cargoElement.value
  };

  makeRequest('personal/put.php', {
    method: 'PUT',
    params: {
      id
    },
    body
  })
    .then(data => {
      location.reload()
    });
})

buttonDelete.addEventListener('click', (event) => {
  event.preventDefault();

  makeRequest('personal/delete.php', {
    method: 'DELETE',
    params: {
      id
    }
  })
    .then(data => {
      location.reload()
    });
})

initFormData();