<?php
// Escapa texto para mostrarlo de forma segura en HTML.
function e($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

// Valores iniciales vacíos.
$titulo = '';
$fecha = '';
$categoria = '';
$errores = [];

// Solo procesamos los datos cuando se envía el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibimos los datos quitando espacios al inicio y al final.
    $titulo = trim($_POST['titulo'] ?? '');
    $fecha = trim($_POST['fecha'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');

    // Validar título.
    if ($titulo === '') {
        $errores['titulo'] = 'El título es obligatorio.';
    } elseif (mb_strlen($titulo) > 120) {
        $errores['titulo'] = 'El título no puede tener más de 120 caracteres.';
    }

    // Validar fecha.
    if ($fecha === '') {
        $errores['fecha'] = 'La fecha es obligatoria.';
    } else {
        $fechaValida = DateTime::createFromFormat('Y-m-d', $fecha);

        if (
            !$fechaValida ||
            $fechaValida->format('Y-m-d') !== $fecha
        ) {
            $errores['fecha'] = 'La fecha no es válida.';
        }
    }

    // Validar categoría.
    $categoriasPermitidas = ['trabajo', 'personal', 'estudio', 'ocio'];

    if (!in_array($categoria, $categoriasPermitidas, true)) {
        $errores['categoria'] = 'Selecciona una categoría válida.';
    }

    // Paso 8 · Guardar en MySQL
    // Solo guardamos si es POST y no existen errores de validación.
    if (empty($errores)) {
        try {
            require 'conexion.php';

            $stmt = $mysqli->prepare(
                'INSERT INTO eventos (titulo, fecha, categoria) VALUES (?, ?, ?)'
            );

            $stmt->bind_param('sss', $titulo, $fecha, $categoria);
            $stmt->execute();

            $stmt->close();
            $mysqli->close();

            header('Location: index.php?ok=1');
            exit;

        } catch (mysqli_sql_exception $e) {
            $errores['general'] = 'No se pudo guardar.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar evento - AgendaWeb</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="header">
        <div class="contenedor navbar">
            <a href="index.php" class="logo">AgendaWeb</a>

            <nav class="nav">
                <a href="index.php">Inicio</a>
                <a href="index.php#agenda">Agenda</a>
                <a href="registrar.php">Nuevo evento</a>
                <a href="index.php#calendario">Calendario</a>
                <a href="index.php#contacto">Contacto</a>
            </nav>

            <a href="index.php" class="btn btn-pequeno">← Volver</a>
        </div>
    </header>

    <main class="pagina-registrar">
        <div class="contenedor">
            <div class="registrar-contenido">

                <div class="registrar-encabezado">
                    <span class="etiqueta">NUEVO EVENTO</span>
                    <h1>Crear evento</h1>
                    <p>Completa la información para agregar un nuevo evento a tu agenda.</p>
                </div>

                <?php if (isset($errores['general'])): ?>
                    <div class="alert alert--error">
                        <?= e($errores['general']) ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="" novalidate>
                    <div class="form-group">
                        <label class="form-label" for="titulo">Título</label>

                        <input
                            type="text"
                            name="titulo"
                            id="titulo"
                            class="form-input<?= isset($errores['titulo']) ? ' is-invalid' : '' ?>"
                            required
                            maxlength="120"
                            value="<?= e($titulo) ?>"
                        >

                        <?php if (isset($errores['titulo'])): ?>
                            <p class="form-error"><?= e($errores['titulo']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="fecha">Fecha</label>

                        <input
                            type="date"
                            name="fecha"
                            id="fecha"
                            class="form-input<?= isset($errores['fecha']) ? ' is-invalid' : '' ?>"
                            required
                            value="<?= e($fecha) ?>"
                        >

                        <?php if (isset($errores['fecha'])): ?>
                            <p class="form-error"><?= e($errores['fecha']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="categoria">Categoría</label>

                        <select
                            name="categoria"
                            id="categoria"
                            class="form-select<?= isset($errores['categoria']) ? ' is-invalid' : '' ?>"
                            required
                        >
                            <option value="">— Elige una —</option>

                            <option
                                value="trabajo"
                                <?= $categoria === 'trabajo' ? 'selected' : '' ?>
                            >
                                Trabajo
                            </option>

                            <option
                                value="personal"
                                <?= $categoria === 'personal' ? 'selected' : '' ?>
                            >
                                Personal
                            </option>

                            <option
                                value="estudio"
                                <?= $categoria === 'estudio' ? 'selected' : '' ?>
                            >
                                Estudio
                            </option>

                            <option
                                value="ocio"
                                <?= $categoria === 'ocio' ? 'selected' : '' ?>
                            >
                                Ocio / Deporte
                            </option>
                        </select>

                        <?php if (isset($errores['categoria'])): ?>
                            <p class="form-error"><?= e($errores['categoria']) ?></p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn-primary">
                        Guardar evento
                    </button>
                </form>

            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="contenedor">
            <p>© 2026 AgendaWeb · Organiza tu tiempo.</p>
        </div>
    </footer>
</body>
</html>