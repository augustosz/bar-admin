<?php
include 'db.php';
include 'sidebar.php';

session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirigir al login si no ha iniciado sesión
    exit();
}

$empleadosQuery = $pdo->query("SELECT * FROM empleados");
?>

<body>
  <div class="content">
    <h1 class="text-center mb-4">Empleados</h1>
    <!-- Sección de Empleados -->
    <section id="empleados">
      <h2>Empleados</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Salario</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($empleado = $empleadosQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($empleado['nombre']); ?></td>
              <td><?php echo htmlspecialchars($empleado['puesto']); ?></td>
              <td><?php echo htmlspecialchars($empleado['salario']); ?>€</td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>

  </div>

</body>

</html>