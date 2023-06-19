import { makeRequest } from "../lib.js";

let id;

const editOrdenButtons = document.querySelectorAll('.edit-orden-modal');
const deleteOrdenButtons = document.querySelectorAll('.delete-orden-modal');
const buttonSubmit = document.querySelector('button#update');
const buttonDelete = document.querySelector('button#delete');

const formElement = document.querySelector('div.modal.fade form');

const personalElement = formElement.querySelector(`#personal`);
const descripcionElement = formElement.querySelector(`#descripcion`);

const initFormData = async () => {
  const personal = await makeRequest('personal/list.php')

  personal.forEach(({ personal_id, nombre }) => {
    const optionElement = document.createElement('option');

    optionElement.value = personal_id;
    optionElement.textContent = nombre

    personalElement.appendChild(optionElement);
  })

  editOrdenButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');
      
      completeOrdenData({ personal })
    })
  })

  deleteOrdenButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');
    })
  })
}

const completeOrdenData = async ({ personal }) => {
  const orden = await makeRequest('orden/get.php', {
      params: {
        id
      }
    });

  descripcionElement.value = orden.descripcion_asignacion;

  const personalIndex = personal.findIndex(({ personal_id }) =>  personal_id === orden.personal_id);

  personalElement.selectedIndex = personalIndex + 1;
}

buttonSubmit.addEventListener('click', (event) => {
  event.preventDefault()
  
  const body = {
    descripcion_asignacion: descripcionElement.value,
    personal_id: personalElement.value
  };

  makeRequest('orden/put.php', {
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

  makeRequest('orden/delete.php', {
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