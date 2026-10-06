const modal = document.getElementById("modal");
const formulario = document.getElementById("formularioEvento");
const listaEventos = document.getElementById("listaEventos");
const mensaje = document.getElementById("mensaje");

const abrirModal = document.getElementById("abrirModal");
const abrirModalHero = document.getElementById("abrirModalHero");
const abrirModalAgenda = document.getElementById("abrirModalAgenda");

const cerrarModal = document.getElementById("cerrarModal");
const cancelar = document.getElementById("cancelar");




function mostrarModal() {
    modal.classList.add("activo");
}


function ocultarModal() {
    modal.classList.remove("activo");
}




abrirModal.addEventListener("click", mostrarModal);

abrirModalHero.addEventListener("click", mostrarModal);

abrirModalAgenda.addEventListener("click", mostrarModal);




cerrarModal.addEventListener("click", ocultarModal);

cancelar.addEventListener("click", ocultarModal);




modal.addEventListener("click", function (evento) {

    if (evento.target === modal) {
        ocultarModal();
    }

});




document.addEventListener("keydown", function (evento) {

    if (evento.key === "Escape") {
        ocultarModal();
    }

});



formulario.addEventListener("submit", function (evento) {

    evento.preventDefault();


    // Obtener datos del formulario

    const titulo =
        document.getElementById("titulo").value.trim();

    const fecha =
        document.getElementById("fecha").value;

    const hora =
        document.getElementById("hora").value;

    const lugar =
        document.getElementById("lugar").value.trim();

    const descripcion =
        document.getElementById("descripcion").value.trim();


  

    const fechaObjeto = new Date(fecha + "T00:00:00");


    const dia = fechaObjeto
        .toLocaleDateString("es-MX", {
            weekday: "short"
        })
        .replace(".", "")
        .toUpperCase();


    const numeroDia = fechaObjeto
        .toLocaleDateString("es-MX", {
            day: "2-digit"
        });


    const mes = fechaObjeto
        .toLocaleDateString("es-MX", {
            month: "short"
        })
        .replace(".", "")
        .toUpperCase();


    const horaFormateada = new Date(
        `1970-01-01T${hora}`
    ).toLocaleTimeString("es-MX", {
        hour: "numeric",
        minute: "2-digit"
    });



    const tarjeta = document.createElement("article");

    tarjeta.classList.add("card");


    tarjeta.innerHTML = `

        <div class="fecha">

            <span>${escapeHTML(dia)}</span>

            <strong>${escapeHTML(numeroDia)}</strong>

            <small>${escapeHTML(mes)}</small>

        </div>


        <div class="evento-info">

            <h3>
                ${escapeHTML(titulo)}
            </h3>

            <p>
                ${
                    descripcion
                        ? escapeHTML(descripcion)
                        : "Sin descripción."
                }
            </p>

            <div class="evento-detalles">

                <span>
                    🕐 ${escapeHTML(horaFormateada)}
                </span>

                <span>
                    📍 ${
                        lugar
                            ? escapeHTML(lugar)
                            : "Sin lugar"
                    }
                </span>

            </div>

        </div>

    `;


    // ========================================
    // AGREGAR EVENTO
    // ========================================

    listaEventos.prepend(tarjeta);


    // ========================================
    // LIMPIAR FORMULARIO
    // ========================================

    formulario.reset();


    // ========================================
    // CERRAR MODAL
    // ========================================

    ocultarModal();


    // ========================================
    // MOSTRAR MENSAJE
    // ========================================

    mensaje.style.display = "block";


    setTimeout(function () {

        mensaje.style.display = "none";

    }, 3000);




    document.getElementById("agenda").scrollIntoView({
        behavior: "smooth"
    });

});



function escapeHTML(texto) {

    const elemento = document.createElement("div");

    elemento.textContent = texto;

    return elemento.innerHTML;

}