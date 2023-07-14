
/*import axios from 'axios'

const urlBase = 'http://localhost/nom035/backend/trabajador'

const obtenerEmpleados = () => {
    axios.get(`${urlBase}obtenerUsuarios.php`)
    .then(respuesta => console.log(respuesta.data))
    .catch(error => console.log(error))
}
//obtenerEmpleados()

const agregarEmpleado = () => {
    axios.post(`${urlBase}agregarUsuario.php`, {
        usuario: 'Rubi',
        contrasena: 'rubi8765',
        email: 'rubi@local.com'
    })
    .then(respuesta => console.log(respuesta.data))
    .catch(error => console.log(error))
}
//agregarEmpleado()
//obtenerEmpleados()

const editarEmpleado = () => {
    axios.put(`${urlBase}editarUsuario.php`, {
        idUsuario: '96',
        usuario: 'Laura Rubi',
        contrasena: 'laurarubi345',
        email: 'laurarubi@local.com'
    })
    .then(respuesta => console.log(respuesta.data))
    .catch(error => console.log(error))
}
//editarEmpleado();

const eliminarEmpleado = () => {
    axios.delete(`${urlBase}borrarUsuario.php`, {
        data: {
            idUsuario: '96'
        }
    })
    .then(respuesta => console.log('Empleado Eliminado: ', respuesta.data))
    .catch(error => console.log(error))
}
eliminarEmpleado()
*/






import axios from 'axios';

const button = document.getElementById('button')

button .addEventListenner('click',()=>{
    axios ({
        method:'GET',
        url:'http://localhost/nom035/backend/trabajador'
    }).then(res => {
        const list = document.getElementById('list')
        const fragment = document.createDocumentFragment()
        for(const userInfo of res.data){
            const listItem = document.createElement('LI')
            listItem.textContent = `${userInfo.id} - ${userInfo.name}`
            fragment.appendChild(listItem)
        }
        list.appendChild(fragment)
    }).catch(err => console.log(error))
    })

    axios({
        method: 'post',
        url: 'http://localhost/nom035/backend/trabajador',
        data: {
            idTra:'01',
          nombre: 'Fredy',
          ApePater: 'Flintstone',
          ApeMate:'Rodrgiguez',
          RFC:'1234567890',
          CURP:'1234567890123456',
          Fecha_Ingreso:'2022-10-11',
          Fecha_Salida:'2022-10-12',
          idDire:'6',
          idPuesto:'CO2'

        }
      });
      axios({
        method: 'get',
        url: 'http://localhost/nom035/backend/trabajador',
        responseType: 'stream'
      })
        .then(function (response) {
          response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
        });




axios.get('/trabajador?ID=12345')
  .then(function (response) {
    
    console.log(response);
  })
  .catch(function (error) {
    
    console.log(error);
  })
  .finally(function () {
    
  });


axios.get('/trabajador', {
    params: {
      ID: 12345
    }
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  })
  .finally(function () {
   
  });

async function getUser() {
  try {
    const response = await axios.get('/trabajador?ID=12345');
    console.log(response);
  } catch (error) {
    console.error(error);
  }
}


