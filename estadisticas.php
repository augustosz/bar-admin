<?php
include 'sidebar.php';

?>

<div class="content">
  <h1 class="text-center mb-4">Estadisticas</h1>
  <div class="container mt-5">

    <?php
    // Llamar al script Python
    $output = shell_exec('/opt/lampp/htdocs/bar_administrate/venv/bin/python3 /opt/lampp/htdocs/bar_administrate/generate_chart.py');

    // Mostrar la imagen en la página
    echo '<img src="img/chart.png" alt="Gráfico de ventas">';
    ?>
  </div>
  <div>