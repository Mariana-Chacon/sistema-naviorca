import { makeRequest } from "../lib.js";

let id;

const editEquipoButtons = document.querySelectorAll('.edit-equipo-modal');
const deleteEquipoButtons = document.querySelectorAll('.delete-equipo-modal');
const buttonSubmit = document.querySelector('button#update');
const buttonDelete = document.querySelector('button#delete');

const formElement = document.querySelector('div.modal.fade form');

const marcaElement = formElement.querySelector(`#marca`);
const modeloElement = formElement.querySelector(`#modelo`);
const serialElement = formElement.querySelector(`#serial`);

const initFormData = async () => {
  editEquipoButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');
      
      completeEquipoData()
    })
  })

  deleteEquipoButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');
    })
  })
}

const completeEquipoData = async () => {
  const equipo = await makeRequest('equipo/get.php', {
      params: {
        id
      }
    });

  marcaElement.value = equipo.marca;
  modeloElement.value = equipo.modelo;
  serialElement.value = equipo.serial;
}

buttonSubmit.addEventListener('click', (event) => {
  event.preventDefault()
  
  const body = {
    marca: marcaElement.value,
    modelo: modeloElement.value,
    serial: serialElement.value
  };

  makeRequest('equipo/put.php', {
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

  makeRequest('equipo/delete.php', {
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