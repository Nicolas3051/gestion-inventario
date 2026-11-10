
<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    $sql = "INSERT INTO productos
    (nombre, descripcion, precio, cantidad)
    VALUES (?, ?, ?, ?)";

    $consulta = $conexion->prepare($sql);

    $consulta->bind_param(
        "ssdi",
        $nombre,
        $descripcion,
        $precio,
        $cantidad
    );

    if ($consulta->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al registrar el producto.";
    }
}
?>
