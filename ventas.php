<?php
include 'db.php';
include 'sidebar.php';

session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no ha iniciado sesión
    exit();
}

$ventasQuery = $pdo->query("SELECT * FROM ventas");
?>




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

  



</html>

