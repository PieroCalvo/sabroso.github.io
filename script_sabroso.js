// Scroll suave al hacer clic en la flecha
document.querySelector('.scroll-down').addEventListener('click', () => {
    const videoHeight = document.querySelector('.video-container').offsetHeight;
    window.scrollTo({
        top: videoHeight,
        behavior: 'smooth'
    });
});

// Scroll instantáneo a secciones
function scrollToSection(sectionId) {
    document.querySelector(sectionId).scrollIntoView({
        behavior: 'auto'
    });
}

// Efecto de opacidad gradual en la navbar y deslizamiento de contenido al hacer scroll
window.addEventListener('scroll', () => {
    const video = document.querySelector('.video-container');
    const navbar = document.querySelector('.navbar');
    const navbarLogo = document.querySelector('.navbar-logo img');
    const sectionsWrapper = document.querySelector('.sections-wrapper');
    let scrollPos = window.scrollY;
    let videoHeight = video.offsetHeight;

    if (scrollPos < videoHeight) {
        let opacity = scrollPos / videoHeight;
        navbar.style.backgroundColor = `rgba(0, 0, 0, ${opacity})`;
        navbarLogo.style.opacity = opacity;
        navbarLogo.style.transform = `scale(${1 + opacity * 0.2})`;
        sectionsWrapper.style.transform = `translateX(${50 - (scrollPos / videoHeight) * 50}%)`;
    } else {
        navbar.style.backgroundColor = 'black';
        navbarLogo.style.opacity = 1;
        navbarLogo.style.transform = 'scale(1.2)';
        sectionsWrapper.style.transform = 'translateX(0%)';
    }
});

document.addEventListener("scroll", function() {
    const video = document.getElementById("video-background");
    const cartButton = document.getElementById("cart-btn");

    if (window.scrollY > video.offsetHeight) {
        cartButton.style.display = "block";
    } else {
        cartButton.style.display = "none";
    }
});

document.getElementById("cart-btn").style.display = "none";

// Control de diapositivas
let currentSlide = {
    'otrosPlatosSlider': 0,
    'bebidasSlider': 0
};

function moveSlide(direction, sliderId) {
    const slides = document.getElementById(sliderId);
    const totalSlides = slides.children.length;

    currentSlide[sliderId] += direction;

    if (currentSlide[sliderId] < 0) {
        currentSlide[sliderId] = totalSlides / 2 - 1;
    } else if (currentSlide[sliderId] >= totalSlides / 2) {
        currentSlide[sliderId] = 0;
    }

    const offset = -currentSlide[sliderId] * (slides.children[0].clientWidth + 20);
    slides.style.transform = `translateX(${offset}px)`;
}

// Carrito lateral deslizante
const cartButton = document.getElementById('cart-btn');
const cartPanel = document.getElementById('cart-panel');
const closeCartBtn = document.getElementById('close-cart-btn');

cartButton.addEventListener('click', () => {
    cartPanel.classList.add('visible');
});

closeCartBtn.addEventListener('click', () => {
    cartPanel.classList.remove('visible');
});

// Inicialización del carrito
let cart = [];
let cartCount = 0;

// Agregar un producto al carrito
function addToCart(item) {
    // Verifica si el item ya está en el carrito y solo incrementa su cantidad
    let existingItem = cart.find(cartItem => cartItem.name === item.name);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        item.quantity = 1;  // Si es un producto nuevo, inicializa su cantidad en 1
        cart.push(item);
    }
    cartCount++;
    updateCart();
}

// Función para incrementar la cantidad de un producto
function increaseQuantity(index) {
    cart[index].quantity++;
    updateCart();
}

// Función para decrementar la cantidad de un producto
function decreaseQuantity(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity--;
        updateCart();
    }
}

// Actualizar el carrito en la interfaz
function updateCart() {
    const cartItemsContainer = document.getElementById("cart-items");
    const cartCountElement = document.getElementById("cart-count");
    const cartTotalElement = document.getElementById("cart-total");

    cartItemsContainer.innerHTML = "";
    let total = 0;

    cart.forEach((item, index) => {
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <div class="cart-item-details">
                <p class="cart-item-name">${item.name}</p>
                <p class="cart-item-price">S/. ${(item.price * item.quantity).toFixed(2)}</p>
                <div class="cart-item-quantity">
                    <button class="decrease-quantity" onclick="decreaseQuantity(${index})">-</button>
                    <span class="quantity">${item.quantity}</span>
                    <button class="increase-quantity" onclick="increaseQuantity(${index})">+</button>
                </div>
            </div>
            <button class="remove-item" onclick="removeFromCart(${index})">
                <i class="fas fa-trash" style="color: orange;"></i>
            </button>
        `;
        cartItemsContainer.appendChild(cartItem);
        total += item.price * item.quantity;  // Total actualizado con la cantidad
    });

    cartCountElement.innerText = cartCount;
    cartTotalElement.innerText = `Total: S/. ${total.toFixed(2)}`;

    updateCartIcon();
}

// Actualizar el icono del carrito
function updateCartIcon() {
    const cartIconCount = document.getElementById('cart-icon-count');
    cartIconCount.innerText = cartCount;
    cartIconCount.style.display = cartCount > 0 ? 'inline-block' : 'none';
}

// Eliminar un producto del carrito
function removeFromCart(index) {
    cart.splice(index, 1);
    cartCount--;
    updateCart();
}

// Finalizar la compra
function checkout() {
    alert("Proceso de compra finalizado.");
}

// Enviar pedido a través de WhatsApp
function sendOrder() {
    const cartItems = document.querySelectorAll('#cart-items .cart-item');
    let orderMessage = "¡Hola! Quiero hacer el siguiente pedido:\n\n";

    cartItems.forEach(item => {
        const itemName = item.querySelector('.cart-item-name').innerText;
        const itemPrice = item.querySelector('.cart-item-price').innerText;
        orderMessage += `${itemName} - ${itemPrice}\n`;
    });

    const total = document.querySelector('#cart-total').innerText;
    orderMessage += `\n${total}\n\n¡Gracias!`;

    const phoneNumber = "51914618845";
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(orderMessage)}`;
    
    window.open(whatsappUrl, '_blank');
}
 