<?php
include 'db.php';
include 'sidebar.php';

$ventasQuery = $pdo->query("SELECT * FROM ventas");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local de Bebidas - Panel Principal</title>
  
  <style>
    /* Estilos para la barra lateral */
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40;
      padding-top: 20px;
      width: 250px;
    }

    .sidebar a {
      color: white;
      padding: 10px;
      text-decoration: none;
      display: block;
    }

    .sidebar a:hover {
      background-color: #575d63;
    }

    .content {
      margin-left: 260px;
      padding: 20px;
    }
  </style>
</head>

<body>


  <!-- Contenido principal -->
  <div class="content">
    <h1 class="text-center mb-4">Ventas</h1>

    <!-- Sección de Ventas -->
    <section id="ventas">
      <h2>Ventas Recientes</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID Venta</th>
            <th>Cliente</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($venta = $ventasQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($venta['id_venta']); ?></td>
              <td><?php echo htmlspecialchars($venta['id_cliente']); ?></td> <!-- Puedes mostrar el nombre del cliente -->
              <td><?php echo htmlspecialchars($venta['total']); ?>€</td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>

  </div>

  

</body>

</html>

