<?php
include 'conexion.php';

$query = "SELECT nombre, direccion, telefono, imagen FROM Locales";
$result = $conn->query($query);

echo "<div class='items-container'>"; // Contenedor de items

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='item'>
                <img src='../polleria/imagenes/" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>
                <h3>" . $row['nombre'] . "</h3>
                <p>" . $row['direccion'] . "</p>
                <p>Teléfono: " . $row['telefono'] . "</p>
              </div>";
    }
} else {
    echo "<p>No hay locales disponibles.</p>";
}
echo "</div>"; // Cerrar contenedor de items
?>
