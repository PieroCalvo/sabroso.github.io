<?php
include 'conexion.php';

$query = "SELECT nombre, precio, descripcion, imagen FROM Otros_Platos";
$result = $conn->query($query);

$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
} 

// Duplicar los items para el efecto infinito
$items = array_merge($items, $items); // Esto duplica los elementos

echo "<div class='slider-container'>"; // Contenedor del slider
echo "<button class='slider-btn left-btn' onclick='moveSlide(-1, \"otrosPlatosSlider\")'>&lt;</button>"; // Flecha izquierda
echo "<div class='items-slider' id='otrosPlatosSlider'>"; // Slider de items

foreach ($items as $row) {
    echo "<div class='item'>
            <img src='../polleria/imagenes/" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>
            <h3>" . $row['nombre'] . "</h3>
            <p>" . $row['descripcion'] . "</p>
            <p class='price'>Precio: S/" . $row['precio'] . "</p>
            <button class='add-btn' onclick=\"addToCart({ 'name': '{$row['nombre']}', 'price': {$row['precio']} })\">Agregar</button>
          </div>";
}

echo "</div>"; // Cerrar slider de items
echo "<button class='slider-btn right-btn' onclick='moveSlide(1, \"otrosPlatosSlider\")'>&gt;</button>"; // Flecha derecha
echo "</div>"; // Cerrar contenedor del slider
?>
