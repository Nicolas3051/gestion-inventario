
<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    $sql = "UPDATE productos
            SET nombre=?, descripcion=?, precio=?, cantidad=?
            WHERE id=?";

    $consulta = $conexion->prepare($sql);
    $consulta->bind_param(
        "ssdii",
        $nombre,
        $descripcion,
        $precio,
        $cantidad,
        $id
    );

    if ($consulta->execute()) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto.";
    }

    $consulta->close();
}
?>

<h2>Actualizar producto</h2>

<form method="POST">
    <input type="number" name="id"
           placeholder="ID del producto" required><br><br>

    <input type="text" name="nombre"
           placeholder="Nuevo nombre" required><br><br>

    <input type="text" name="descripcion"
           placeholder="Nueva descripción"><br><br>

    <input type="number" name="precio"
           placeholder="Nuevo precio" step="0.01" min="0" required><br><br>

    <input type="number" name="cantidad"
           placeholder="Nueva cantidad" min="0" required><br><br>

    <button type="submit">Actualizar producto</button>
</form>

<a href="../index.php">Volver al inicio</a>
