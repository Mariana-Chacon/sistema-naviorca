import { makeRequest } from "../lib.js";

const buttonModalElements = document.querySelectorAll('.edit-orden-modal');

buttonModalElements.forEach(element => {
  element.addEventListener('click', (event) => {
    const id = element.getAttribute('data-id');
    
    completeOrdenData(id)
  })
})

const completeOrdenData = async (id) => {
  const orden = await makeRequest('orden/get.php', {
    params: {
      id
    }
  })

  console.log(orden)
}