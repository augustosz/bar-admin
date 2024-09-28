<?php
include 'db.php';
include 'sidebar.php';

session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no ha iniciado sesión
    exit();
}

$comprasQuery = $pdo->query("SELECT * FROM compras");

?>

<body>
  <div class="content">
    <h1 class="text-center mb-4">Compras</h1>
    <!-- Sección de Productos -->
    <section id="productos">
      <h2>Compras</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID compra</th>
            <th>ID proveedor</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($compra = $comprasQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($compra['id_compra']); ?></td>
              <td><?php echo htmlspecialchars($compra['id_proveedor']); ?></td>
              <td>$ <?php echo htmlspecialchars($compra['total']); ?></td>
            </tr>
          <?php endwhile; ?>
        <tbody>
      </table>
    </section>

  </div>

</body>

</html>