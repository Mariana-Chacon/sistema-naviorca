/*****FUNCION QUE PERMITE HACER CONSULTAS POR API, MEDIANTE JAVASCRIPT******/

export const makeRequest = async (url, { body, params = {}, ...restParams} = {}) => {
  const queryString = Object.keys(params).map((key) => {
    return `${key}=${encodeURIComponent(params[key])}`;
  }).join('&');

  // Concatenar la cadena de consulta a la URL
  const finalUrl = url + (queryString.length ? `?${queryString}` : '');

  const fetchData = await fetch(`api/${finalUrl}`, {
    ...restParams,
    ...body && { body: JSON.stringify(body), headers: { 'Content-Type': 'application/json' } }
  });
  const requestData = await fetchData.json();

  return requestData;
};

/****SIRVE PARA HACER CONSULTAS A LA BASE DE DATOS POR API MEDIANTE JAVASCRIPT */
