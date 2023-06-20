import { makeRequest } from "../lib.js";

let id;

const editOrdenButtons = document.querySelectorAll('.edit-orden-modal');
const buttonSubmit = document.querySelector('button#update');
const iniciarButtons = document.querySelectorAll('button.iniciar');
const finalizarButtons = document.querySelectorAll('.finalizar-orden-modal');
const buttonFinalizar = document.querySelector('button#finalizar');

const formElement = document.querySelector('div.modal.fade form');

const personalElement = formElement.querySelector(`#personal`);
const descripcionElement = formElement.querySelector(`#descripcion`);
const descripcionInformeElement = document.querySelector(`#descripcion-informe`);

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

  iniciarButtons.forEach(element => {
    element.addEventListener('click', (event) => {
      id = element.getAttribute('data-id');

      makeRequest('orden/iniciar.php', {
        method: 'POST',
        params: {
          id
        }
      })
        .then(data => {
          location.reload()
        });
    })
  })

  finalizarButtons.forEach(element => {
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

buttonFinalizar.addEventListener('click', (event) => {
  event.preventDefault();

  const body = {
    informacion_informe: descripcionInformeElement.value
  }

  makeRequest('orden/finalizar.php', {
    method: 'POST',
    params: {
      id
    },
    body
  })
    .then(data => {
      location.reload()
    });
})

initFormData();