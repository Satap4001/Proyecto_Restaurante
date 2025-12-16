<style>
/* Contenedor principal del header */
header {
    width: 100%;
    padding: 10px 20px;
    box-sizing: border-box;
    background-color: #f0f0f0;
    grid-template-columns: 1fr 1fr 1fr;
    margin: 0;
}

header .header-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr; /* tres columnas iguales */
    align-items: center;
}

/* Zona izquierda */
.header-left {
    text-align: left;
}

.header-left b {
    color: #587ba1ff;
    font-weight: 600;
}

/* Zona centro*/
.header-center {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;  
    gap: 5px;
}

/* Enlaces del centro */
.header-center a {
    text-decoration: none;
    color: #587ba1ff;
    font-weight: 600;
    display: flex;
    align-items: center;
}

/* Icono centro */
.header-center img {
    width: 20px;
    height: 20px;
    object-fit: contain;
}

/* Zona derecha */
.header-right {
    display: flex;
    justify-content: flex-end; /* alinea a la derecha */
    align-items: center;
    gap: 10px;
}

.header-right a {
    text-decoration: none;
    color: #587ba1ff;
    font-weight: 600;
    display: flex;
    align-items: center;
}

/* Icono carrito */
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