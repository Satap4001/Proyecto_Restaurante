<style>
    header div {
        display: flex;
        justify-content: space-evenly;

    }

    header div div {
        justify-content: flex-end;
    }
    header div div a {
        justify-content: right;
        padding: 10px;
    }
</style>
<header>
    <?php session_start(); ?>
    <div>
        <div>
            <?php echo $_SESSION['usuario']; ?>
        </div>
        <div>
            <a href="categorias.php">Categorias</a>
        </div>
        <div>
            <a href="carrito.php">Carrito</a>
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
</header>