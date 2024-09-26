<?php
include 'db.php'; // Conexión a la base de datos
include 'sidebar.php';

// Consultas para obtener los datos
$productosQuery = $pdo->query("SELECT * FROM productos");
$ventasQuery = $pdo->query("SELECT * FROM ventas");
$empleadosQuery = $pdo->query("SELECT * FROM empleados");
$proveedoresQuery = $pdo->query("SELECT * FROM proveedores");
$clientesQuery = $pdo->query("SELECT * FROM clientes");
$comprasQuery = $pdo->query("SELECT * FROM compras");
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
    <h1 class="text-center mb-4">Panel Principal - Local de Bebidas</h1>

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
        </tbody>
      </table>
    </section>

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

    <!-- Sección de Compras -->
    <section id="compras">
      <h2>Compras</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID Compra</th>
            <th>Proveedor</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($compra = $comprasQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><?php echo htmlspecialchars($compra['id_compra']); ?></td>
              <td><?php echo htmlspecialchars($compra['id_proveedor']); ?></td> <!-- Puedes mostrar el nombre del proveedor -->
              <td><?php echo htmlspecialchars($compra['total']); ?>€</td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>
  </div>

  

</body>

</html>