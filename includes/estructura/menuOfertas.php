<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloMenuOfertas.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
</head>
<body>
  <div class="topnav">
    <div class="search-container">
      <form action="http://localhost/cornersports/ofertas.php">
        <input type="text" placeholder="Buscar.." name="palabra">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    
    <form class="filtros" action="http://localhost/cornersports/ofertas.php" method="POST">
      <h3>FILTROS</h3>
      <div class="filtro_tipo">
          <p class="titulo_tipo">Tipo de producto</p>
          <div class="caja_sup">
            <input class="chk_deportes" type="checkbox" name="deportes" value="deporte" />Deportes<br/><br/>
            <input class="chk_maquinas" type="checkbox" name="maquinas" value="maquina" />Máquinas<br/><br/>
          </div>
          <input type="checkbox" name="mujer" value="prendaMujer" />Prendas Mujer<br/><br/>
          <input type="checkbox" name="hombre" value="prendaHombre" />Prendas Hombre<br/><br/>
        </div>

        <div class="filtro_precio">
          <p class="titulo_tipo">Precio</p>
          <select class="selector" name="precio">
          <option class="selector" value="todos">Todos</option>
          <option class="selector" value="20">≤ 20 €</option>
          <option class="selector" value="40">≤ 40 €</option>
          <option class="selector" value="100">≤ 100 €</option>
          <option class="selector" value="200">≤ 200 €</option>
          </select>
        </div>
        <div class="filtro_descuento">
          <p class="titulo_tipo">Descuento</p>
          <select class="selector" name="descuento">
            <option class="selector" value="todos">Todos</option>
            <option class="selector" value="10">≥ 10 %</option>
            <option class="selector" value="20">≥ 20 %</option>
            <option class="selector" value="30">≥ 30 %</option>
            <option class="selector" value="50">≥ 50 %</option>
          </select>
        </div>
        <button class="enviar_filtros" type="submit">Buscar</button>
    </form> 
  </div>
</body>
</html>