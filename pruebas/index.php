<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AgendaWeb</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    >

  
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <header class="header">
        <div class="contenedor navbar">

            <a href="#" class="logo">AgendaWeb</a>

            <nav class="nav">
                <a href="#inicio">Inicio</a>
                <a href="#agenda">Agenda</a>
                <a href="#calendario">Calendario</a>
                <a href="#contacto">Contacto</a>
            </nav>

            <button class="btn btn-pequeno" id="abrirModal">
                + Crear evento
            </button>

        </div>
    </header>


  
    <main>

      
        <section class="hero" id="inicio">

            <div class="contenedor hero-contenido">

                <div class="hero-texto">

                    <span class="badge">
                        Tu tiempo, organizado
                    </span>

                    <h1>
                        Organiza tu día.<br>
                        Vive mejor.
                    </h1>

                    <p>
                        Agenda tus eventos, citas y actividades
                        en un solo lugar. Sencillo, elegante y
                        fácil de usar.
                    </p>

                    <div class="hero-botones">

                        <a href="#agenda" class="btn btn-principal">
                            Ver mi agenda
                        </a>

                        <button
                            class="btn btn-secundario"
                            id="abrirModalHero"
                        >
                            + Crear evento
                        </button>

                    </div>

                </div>

            </div>

        </section>


       
        <section class="agenda" id="agenda">

            <div class="contenedor">

                <div class="seccion-encabezado">

                    <div>
                        <span class="etiqueta">
                            PRÓXIMOS EVENTOS
                        </span>

                        <h2>
                            Mi agenda
                        </h2>
                    </div>

                    <button
                        class="btn btn-principal"
                        id="abrirModalAgenda"
                    >
                        + Nuevo evento
                    </button>

                </div>


                <!-- MENSAJE -->
                <div class="mensaje" id="mensaje">
                    Evento creado correctamente.
                </div>


                <!-- LISTA DE EVENTOS -->
                <div class="lista-eventos" id="listaEventos">

                    <article class="card">

                        <div class="fecha">
                            <span>LUN</span>
                            <strong>29</strong>
                            <small>SEP</small>
                        </div>

                        <div class="evento-info">

                            <h3>
                                Reunión de proyecto
                            </h3>

                            <p>
                                Revisión de avances del proyecto.
                            </p>

                            <div class="evento-detalles">

                                <span>
                                    🕐 10:00 AM
                                </span>

                                <span>
                                    📍 Sala de reuniones
                                </span>

                            </div>

                        </div>

                    </article>


                    <article class="card">

                        <div class="fecha">
                            <span>MAR</span>
                            <strong>30</strong>
                            <small>SEP</small>
                        </div>

                        <div class="evento-info">

                            <h3>
                                Cita con el cliente
                            </h3>

                            <p>
                                Revisión de propuesta.
                            </p>

                            <div class="evento-detalles">

                                <span>
                                    🕐 12:30 PM
                                </span>

                                <span>
                                    📍 Oficina principal
                                </span>

                            </div>

                        </div>

                    </article>


                    <article class="card">

                        <div class="fecha">
                            <span>MIÉ</span>
                            <strong>01</strong>
                            <small>OCT</small>
                        </div>

                        <div class="evento-info">

                            <h3>
                                Planificación semanal
                            </h3>

                            <p>
                                Organización de actividades.
                            </p>

                            <div class="evento-detalles">

                                <span>
                                    🕐 8:30 AM
                                </span>

                                <span>
                                    📍 Videollamada
                                </span>

                            </div>

                        </div>

                    </article>

                </div>

            </div>

        </section>


        <!-- CALENDARIO -->
        <section class="seccion-extra" id="calendario">

            <div class="contenedor">

                <span class="etiqueta">
                    CALENDARIO
                </span>

                <h2>
                    Próximamente
                </h2>

                <p>
                    Aquí podrás consultar tus eventos
                    organizados en un calendario.
                </p>

            </div>

        </section>


        <!-- CONTACTO -->
        <section class="seccion-extra" id="contacto">

            <div class="contenedor">

                <span class="etiqueta">
                    CONTACTO
                </span>

                <h2>
                    AgendaWeb
                </h2>

                <p>
                    Una forma sencilla de organizar
                    tus actividades.
                </p>

            </div>

        </section>

    </main>


    <div class="modal" id="modal">

        <div class="modal-contenido">

            <button
                class="cerrar"
                id="cerrarModal"
                type="button"
            >
                ×
            </button>

            <span class="etiqueta">
                NUEVO EVENTO
            </span>

            <h2>
                Crear evento
            </h2>

            <p class="modal-descripcion">
                Completa la información de tu evento.
            </p>


            <form id="formularioEvento">

                <div class="campo">

                    <label for="titulo">
                        Nombre del evento
                    </label>

                    <input
                        type="text"
                        id="titulo"
                        placeholder="Ej. Reunión de proyecto"
                        required
                    >

                </div>


                <div class="fila">

                    <div class="campo">

                        <label for="fecha">
                            Fecha
                        </label>

                        <input
                            type="date"
                            id="fecha"
                            required
                        >

                    </div>


                    <div class="campo">

                        <label for="hora">
                            Hora
                        </label>

                        <input
                            type="time"
                            id="hora"
                            required
                        >

                    </div>

                </div>


                <div class="campo">

                    <label for="lugar">
                        Lugar
                    </label>

                    <input
                        type="text"
                        id="lugar"
                        placeholder="Ej. Oficina principal"
                    >

                </div>


                <div class="campo">

                    <label for="descripcion">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        rows="4"
                        placeholder="Agrega una descripción..."
                    ></textarea>

                </div>


                <div class="modal-botones">

                    <button
                        type="button"
                        class="btn btn-cancelar"
                        id="cancelar"
                    >
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        class="btn btn-principal"
                    >
                        Guardar evento
                    </button>

                </div>

            </form>

        </div>

    </div>


  
    <footer class="footer">

        <div class="contenedor">

            <p>
                © 2026 AgendaWeb · Organiza tu tiempo.
            </p>

        </div>

    </footer>


    <!-- JAVASCRIPT -->
    <script src="script.js"></script>

</body>
</html>