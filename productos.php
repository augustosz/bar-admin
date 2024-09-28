<?php
include 'db.php';
include 'sidebar.php';

session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no ha iniciado sesión
    exit();
}

$productosQuery = $pdo->query("SELECT * FROM productos");

?>

<body>
  <div class="content">
    <h1 class="text-center mb-4">Productos</h1>
    <!-- Sección de Productos -->
    <section id="productos">
      <h2>Productos</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($producto = $productosQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
              <td><?php echo htmlspecialchars($producto['precio']); ?>€</td>
              <td><?php echo htmlspecialchars($producto['stock']); ?></td>
            </tr>
          <?php endwhile; ?>
        <tbody>
      </table>
    </section>

  </div>

</body>

</html>