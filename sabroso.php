<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabroso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style_sabroso.css">
</head>
<body>
    <!-- Contenedor del video de fondo y logo central -->
    <div class="video-container">
        <video id="video-background" autoplay muted loop>
            <source src="video1.mp4" type="video/mp4">
        </video>
        <div class="logo-container">
            <img src="logo_sabroso.png" alt="Logo de Sabroso" class="logo">
        </div>
        <div class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>

    <!-- Franja negra (barra de navegación) -->
    <div class="navbar">
        <a href="tel:+51914618845" class="nav-icon phone-icon" aria-label="Llamar a Sabroso">
            <i class="fas fa-phone-alt"></i>
        </a>

        <div class="nav-sections">
            <button class="nav-btn" onclick="scrollToSection('#pollos')">Pollos</button>
            <button class="nav-btn" onclick="scrollToSection('#otros_platos')">Otros Platos</button>
        </div>
        <div class="navbar">
            <div class="navbar-logo">
                <img src="logo_sabroso.png" alt="Logo Sabroso" />
            </div>
        </div>
        <div class="nav-sections">
            <button class="nav-btn" onclick="scrollToSection('#bebidas')">Bebidas</button>
            <button class="nav-btn" onclick="scrollToSection('#locales')">Locales</button>
        </div>

        <a href="https://wa.me/51914618845?text=Hola%20Sabroso,%20hoy%20quiero..." target="_blank" class="nav-icon whatsapp-icon" aria-label="Contactar por WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Botón del Carrito -->
    <button id="cart-btn" class="cart-btn" onclick="toggleCart()">
        <i class="fas fa-shopping-cart"></i>
        <span id="cart-count" class="cart-badge">0</span>
    </button>

    <!-- Panel del carrito -->
    <div id="cart-panel" class="cart">
        <button class="close-cart" id="close-cart-btn" onclick="toggleCart()">X</button>
        <h2 class="cart-title">Carrito</h2> <!-- Título agregado -->
        <div id="cart-items"></div>
        <p id="cart-total" class="cart-total"></p>
        <button class="checkout-btn" id="order-btn" onclick="sendOrder()">Pedir Ahora</button> <!-- Cambiado a "Pedir Ahora" -->
    </div>



    <!-- Contenido principal -->
    <div class="sections-wrapper">
        <section id="pollos">
            <h2>Pollos a la Leña</h2>
            <div class="slider">
                <div class="items-container slider-track">
                    <?php include 'pollos.php'; ?>
                </div>
            </div>
        </section>
        <section id="otros_platos">
            <h2>Otros Platos</h2>
            <div class="slider">
                <div class="items-container slider-track">
                    <?php include 'otros_platos.php'; ?>
                </div>
            </div>
        </section>
        <section id="bebidas">
            <h2>Bebidas</h2>
            <div class="slider">
                <div class="items-container slider-track">
                    <?php include 'bebidas.php'; ?>
                </div>
            </div>
        </section>
        <div class="details-section">
            <div class="detail-item">
                <i class="fas fa-star detail-icon"></i> <!-- Icono de estrella para Calidad -->
                <h3>Atención de Calidad</h3>
                <p>Brindamos una atención de calidad y personalizada, para que te sientas como en casa!</p>
            </div>
            <div class="detail-item">
                <i class="fas fa-seedling detail-icon"></i> <!-- Icono de semilla para Pollos Orgánicos -->
                <h3>Pollos & Parrillas 100% Orgánicos</h3>
                <p>Todos nuestros Pollos a la Brasa & Parrillas son 100% orgánicos y naturales, con una sazón única que tienes que probar!</p>
            </div>
            <div class="detail-item">
                <i class="fas fa-store detail-icon"></i> <!-- Icono de tienda para Locales Confortables -->
                <h3>Locales Confortables en Cusco</h3>
                <p>Contamos con un local amplio y confortable, para que disfrutes tus Pollos a la Brasa & Parrillas, de la mejor manera!</p>
            </div>
            <div class="detail-item">
                <i class="fas fa-truck detail-icon"></i> <!-- Icono de camión para Delivery Rápido -->
                <h3>Delivery Rápido</h3>
                <p>Llevamos tus pedidos hasta la puerta de tu casa en todo Cusco, con puntualidad y rapidez!</p>
            </div>
        </div>


        <section id="locales">
            <h2>Locales</h2>
            <div class="items-container">
                <?php include 'locales.php'; ?>
            </div>
        </section>
    </div>

    <footer>
        <p>© 2024 Sabroso - Todos los derechos reservados.</p>
    </footer>

    <script src="script_sabroso.js"></script>
</body>
</html>