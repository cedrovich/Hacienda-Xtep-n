<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylebanqts.css">
    <title>Menú de Banquetes</title>
</head>
<body>
    <?php include "menu.php";?>

    <div class="contenedor_menu">
        <h1>Menú de Banquetes</h1>
        <hr>
        <div class="menu-list">
            <?php
            require "conexion.php";
            $query = "SELECT * FROM banquete_menu";
            $result = mysqli_query($conectar, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($fila = mysqli_fetch_assoc($result)) {
                    echo '<div class="menu-card">';
                    echo '<h2>' . htmlspecialchars($fila['nombre_menu']) . '</h2>';
                    echo '<a href="ver_menu.php?id=' . htmlspecialchars($fila['id']) . '"><img src="' . htmlspecialchars($fila['imagen']) . '" alt="Imagen de ' . htmlspecialchars($fila['nombre_menu']) . '" title="Ver todo el menú completo"></a>';
                    echo '<p>' . htmlspecialchars($fila['descripcion']) . '</p>';
                    echo "<br>";
                    echo '<div class="contenedor_btn">';
                    echo '<button class="buttonsbmt2"><a href="editar_menu.php?id=' . $fila['id'] . '">Editar</a></button>';
                    echo '<button class="buttonsbmt2" onClick="validar(\'eliminar_menu.php?id=' . $fila['id'] . '\')">Eliminar</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No hay menús disponibles actualmente.</p>';
            }
            ?>
        </div>
        <script>
        function validar(url) {
            var eliminar = confirm("¿Deseas eliminar este menu-banquete?");
            if (eliminar) {
                window.location = url;
            }
        }
        </script>
    </div>
</body>
</html>
