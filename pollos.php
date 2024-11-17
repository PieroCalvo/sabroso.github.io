<?php
include 'conexion.php';

$query = "SELECT nombre, precio, descripcion, imagen FROM Pollos";
$result = $conn->query($query);

echo "<div class='items-container'>"; // Contenedor de items

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='item'>
                <img src='../polleria/imagenes/" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>
                <h3>" . $row['nombre'] . "</h3>
                <p>" . $row['descripcion'] . "</p>
                <p class='price'>Precio: S/" . $row['precio'] . "</p>
                <button class='add-btn' onclick=\"addToCart({ 'name': '{$row['nombre']}', 'price': {$row['precio']} })\">Agregar</button>
              </div>";
    }
} else {
    echo "<p>No hay pollos disponibles.</p>";
}
echo "</div>"; // Cerrar contenedor de items
?>
