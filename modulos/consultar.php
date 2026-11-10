
<?php
include("../conexion.php");

$sql = "SELECT * FROM productos ORDER BY id DESC";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    while ($producto = $resultado->fetch_assoc()) {
        echo "ID: " . $producto["id"] . "<br>";
        echo "Nombre: " . htmlspecialchars($producto["nombre"]) . "<br>";
        echo "Descripción: " . htmlspecialchars($producto["descripcion"]) . "<br>";
        echo "Precio: $" . $producto["precio"] . "<br>";
        echo "Cantidad: " . $producto["cantidad"] . "<br>";
        echo "<hr>";
    }

} else {
    echo "No hay productos registrados.";
}
?>
