var seleccion = {
    personaje: "No has escogido este elemento",
    artefacto_blanca: "No has escogido este elemento",
    artefacto_fuego: "No has escogido este elemento",
    artefacto_tension: "No has escogido este elemento",
    arena: "No has escogido este elemento"
  };
  
function obtener(variable) {
    console.log(variable);
    console.log(ranking);
    console.log(nombre);
    console.log(apellido);
  
    fetch('https://backendmarket.herokuapp.com/api/productos/'+variable)
      .then(datos=>datos.json())
      .then(datos=>{
        var resultado = document.getElementById('resultado');
        resultado.innerHTML = '';
  
        resultado.innerHTML = `
          <div id="tituloOpciones">
              <b><p id="header">Personajes</p></b>
              <p id="subheader">
              Estos son los personajes disponible en el juego, cada uno posee habilidades especiales. <br>
              Selecciona tu favorito y empieza el juego.
              </p>
          </div>
        `;
          
        for (let dato of datos) {
          resultado.innerHTML += `
            <button style="background:transparent; border:none !important; outline:none;" onclick="personaje('${dato.id}')">
              <div class="tarjeta" style="background: rgba(3, 49, 109, 0.781);">
                <img src="${dato.foto}"></p> 
                <h3><b>${dato.nombre}</b></h3>
                <b class="precio"> <b style="color:red;">Ataque:</b> <b style="color:white;">${dato.ataque}</b> </b>
                <b class="precio"> <b style="color:green;">Defensa:</b> <b style="color:white;">${dato.defensa}</b> </b>
                <b class="precio"> <b style="color:orange;">Origen:</b> <b style="color:white;">${dato.origen}</b> </b>
              </div>
            </button>
          `;
        }
      })
    }
}
