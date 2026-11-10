
<?php
include("conexion.php");

$resultado = $conexion->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>Gestión de Inventario</h1>
    <p>Administración y control de productos</p>
</header>

<main>

<nav>
    <h2>Menú principal</h2>

    <ul>
        <li>
            <a href="index.php">Registrar productos</a>
        </li>
        <li>
            <a href="modulos/consultar.php">Consultar inventario</a>
        </li>
        <li>
            <a href="modulos/actualizar.php">Actualizar productos</a>
        </li>
        <li>
            <a href="modulos/eliminar.php">Eliminar productos</a>
        </li>
    </ul>
</nav>

    <section class="panel">
        <h2>Registrar productos</h2>

        <form action="modulos/registrar.php" method="POST">
            <input type="text" name="nombre"
                   placeholder="Nombre del producto" required>

            <input type="text" name="descripcion"
                   placeholder="Descripción">

            <input type="number" name="precio"
                   placeholder="Precio" step="0.01" min="0" required>

            <input type="number" name="cantidad"
                   placeholder="Cantidad" min="0" required>

            <button type="submit">Guardar producto</button>
        </form>
    </section>

    <section class="panel">
        <h2>Productos registrados</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>

            <?php while($producto = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>
</main>

</body>
</html>
