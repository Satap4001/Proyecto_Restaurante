<style>
/* Contenedor principal del header */
header {
    width: 100%;
    padding: 10px 20px;
    box-sizing: border-box;
}

/* Flex para distribuir las tres zonas */
header .header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Zona izquierda */
.header-left b {
    color: #587ba1ff;
    font-weight: 600;
}

/* Zona centro*/
.header-center {
    display: flex;
    align-items: center; 
    gap: 5px; 
}

.header-center a {
    text-decoration: none;
    color: #587ba1ff;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.header-center img {
    width: 20px;
    height: 20px;
    object-fit: contain;
    display: block;
}

/* Zona derecha */
.header-right {
    display: flex;
    align-items: center;
    gap: 10px; /* separación entre carrito y cerrar sesión */
}

.header-right a {
    text-decoration: none;
    color: #587ba1ff;
    font-weight: 600;
    display: flex;
    align-items: center;
}

/* Imagen del carrito */
img {
    width: 20px;
    height: 20px;
    object-fit: contain;
    margin-right: 5px; 
}
</style>

<header>
    <div class="header-container">
        <!-- ZONA IZQUIERDA -->
        <div class="header-left">
            <b>Usuario: <?php session_start(); echo $_SESSION["usuario"]; ?></b>
        </div>

        <!-- ZONA CENTRO -->
        <div class="header-center">
            <img src="Images/home.png" alt="Inicio">
            <a href="categorias.php">Inicio</a>
        </div>

        <!-- ZONA DERECHA -->
        <div class="header-right">
            <a href="carrito.php" class="carrito-icon">
                <img src="Images/carrito.png" alt="Carrito">
            </a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</header>