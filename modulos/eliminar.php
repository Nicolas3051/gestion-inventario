
<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];

    $sql = "DELETE FROM productos WHERE id = ?";

    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("i", $id);

    if ($consulta->execute()) {

        if ($consulta->affected_rows > 0) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "No se encontró el producto.";
        }

    } else {
        echo "Error al eliminar el producto.";
    }

    $consulta->close();
}
?>

<h2>Eliminar producto</h2>

<form method="POST">
    <input type="number" name="id"
           placeholder="ID del producto" required>

    <button type="submit">Eliminar producto</button>
</form>

<br>

<a href="../index.php">Volver al inicio</a>
