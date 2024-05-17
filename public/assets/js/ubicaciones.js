const selectElement = document.getElementById('dep');
const selectmun = document.getElementById('mun');
const apiUrl = "https://www.datos.gov.co/resource/xdk5-pm3f.json?$query=SELECT%0A%20%20%60region%60%2C%0A%20%20%60c_digo_dane_del_departamento%60%2C%0A%20%20%60departamento%60%2C%0A%20%20%60c_digo_dane_del_municipio%60%2C%0A%20%20%60municipio%60%0AORDER%20BY%20%60municipio%60%20ASC%20NULL%20LAST";

// Objeto para mapear códigos numéricos de departamentos a nombres de departamentos
const departmentMap = {};

fetch(apiUrl)
   .then(response => response.json())
   .then(data => {
        const uniqueItems = new Set();

        data.forEach(item => {
            uniqueItems.add(item.c_digo_dane_del_departamento);
            // Agregar entrada al mapeo de departamentos
            departmentMap[item.c_digo_dane_del_departamento] = item.departamento;
        });

        const uniqueArray1 = Array.from(uniqueItems).sort();
        uniqueArray1.forEach(dep => {
            const option = document.createElement('option');
            option.value = dep;
            // Usar el nombre del departamento en lugar del código numérico
            option.textContent = departmentMap[dep];
            selectElement.appendChild(option);
        });

    })
   .catch(error => console.error('Error al obtener los datos:', error));

function getMunicipios() {

    //aca borramos los option que se encuentran en el select

    while (selectmun.firstChild) {
        selectmun.removeChild(selectmun.firstChild);
    }

    const newOption = document.createElement('option');
    newOption.value = 'Seleccione';
    newOption.textContent = 'Seleccione';
    selectmun.appendChild(newOption);

    //tomamos el valor seleccionado en el select de departamentos y lo guardamos en una variable

    const depselected = document.getElementById('dep').value;

    //creamos el array donde almacenaremos los objetos que necesitamos dependiendo el departamento

    const dataArray = [];

    //acemos una peticion a la api donde llenamos el arreglo

    fetch(apiUrl)
       .then(response => response.json())
       .then(data => {

            data.forEach(item => {

                //llenamos el arreglo con los objetos necesarios

                if (item.c_digo_dane_del_departamento == depselected) {
                    dataArray.push(item);
                }

            });

            //recorremos el arreglo y vamos creando un option por cada objeto que se encuentra en el array y extraemos el municipio
            dataArray.sort((a, b) => a.c_digo_dane_del_municipio - b.c_digo_dane_del_municipio);
            dataArray.forEach(objeto => {
                const option = document.createElement('option');
                option.value = objeto.c_digo_dane_del_municipio;
                option.textContent = objeto.municipio;
                selectmun.appendChild(option);
            });

        })
       .catch(error => console.error('Error al obtener los datos:', error));
}
