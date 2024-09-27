<?php
include 'db.php';
include 'sidebar.php';

session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no ha iniciado sesión
    exit();
}

$clientesQuery = $pdo->query("SELECT * FROM clientes");

?>

<body>
  <div class="content">
    <h1 class="text-center mb-4">Clientes</h1>
    <!-- Sección de Clientes -->
    <section id="clientes">
      <h2>Clientes</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($cliente = $clientesQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
              <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
              <td><?php echo htmlspecialchars($cliente['email']); ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>

  </div>

</body>

</html>