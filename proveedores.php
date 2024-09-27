<?php
include 'db.php';
include 'sidebar.php';

session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no ha iniciado sesión
    exit();
}

$proveedoresQuery = $pdo->query("SELECT * FROM proveedores");
?>

<body>
  <div class="content">
    <h1 class="text-center mb-4">Proveedores</h1>
    <!-- Sección de Empleados -->
    <!-- Sección de Proveedores -->
    <section id="proveedores">
      <h2>Proveedores</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($proveedor = $proveedoresQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($proveedor['nombre']); ?></td>
              <td><?php echo htmlspecialchars($proveedor['telefono']); ?></td>
              <td><?php echo htmlspecialchars($proveedor['email']); ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>

  </div>

</body>

</html>