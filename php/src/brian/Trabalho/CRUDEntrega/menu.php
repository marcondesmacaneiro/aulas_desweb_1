<nav>
    <ul class="nav nav-tabs">
        <li <?php if($verifica['index']){echo "class='active'";}?> ><a class="active" href="index.php">Inicio</a></li>
        <li <?php if($verifica['endereco']){echo "class='active'";}?> ><a class="active" href="endereco.php">Endereço</a></li>
        <li <?php if($verifica['cliente']){echo "class='active'";}?> ><a class="active" href="cliente.php">Cliente</a></li>
        <li <?php if($verifica['entrega']){echo "class='active'";}?> ><a class="active" href="entrega.php">Entrega</a></li>
        <li <?php if($verifica['pedido']){echo "class='active'";}?> ><a class="active" href="pedido.php">Pedidos</a></li>             
    </ul>
</nav>