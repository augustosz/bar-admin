<?php

include 'db.php'; // Conexión a la base de datos
include 'sidebar.php';


// Consultas para contar las filas de las tablas
$sql_ventas = "SELECT COUNT(*) AS total FROM ventas";
$result_ventas = $conn->query($sql_ventas);
$row_ventas = $result_ventas->fetch_assoc();
$total_ventas = $row_ventas['total'];

$sql_productos = "SELECT COUNT(*) AS total FROM productos";
$result_productos = $conn->query($sql_productos);
$row_productos = $result_productos->fetch_assoc();
$total_productos = $row_productos['total'];

$sql_alertas = "SELECT COUNT(*) AS total FROM productos WHERE stock <= 10"; // Ejemplo para alertas de bajo stock
$result_alertas = $conn->query($sql_alertas);
$row_alertas = $result_alertas->fetch_assoc();
$total_alertas = $row_alertas['total'];

$sql_empleados = "SELECT COUNT(*) AS total FROM empleados";
$result_empleados = $conn->query($sql_empleados);
$row_empleados = $result_empleados->fetch_assoc();
$total_empleados = $row_empleados['total'];

$sql_clientes = "SELECT COUNT(*) AS total FROM clientes";
$result_clientes = $conn->query($sql_clientes);
$row_clientes = $result_clientes->fetch_assoc();
$total_clientes = $row_clientes['total'];

$sql_proveedores = "SELECT COUNT(*) AS total FROM proveedores";
$result_proveedores = $conn->query($sql_proveedores);
$row_proveedores = $result_proveedores->fetch_assoc();
$total_proveedores = $row_proveedores['total'];
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
    <div class="container mt-5">
        <div class="row">
            <!-- Card 1 - Ventas -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Ventas</div>
                    <div class="card-body">
                        <h5 class="card-title">Total de Ventas</h5>
                        <p class="card-text"><?php echo $total_ventas; ?> ventas registradas.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Productos -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Productos</div>
                    <div class="card-body">
                        <h5 class="card-title">Total de Productos</h5>
                        <p class="card-text"><?php echo $total_productos; ?> productos en inventario.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Alertas -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Alertas</div>
                    <div class="card-body">
                        <h5 class="card-title">Productos en Bajo Stock</h5>
                        <p class="card-text"><?php echo $total_alertas; ?> productos con bajo stock.</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 - Empleados -->
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Empleados</div>
                    <div class="card-body">
                        <h5 class="card-title">Total de Empleados</h5>
                        <p class="card-text"><?php echo $total_empleados; ?> empleados en la nómina.</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 - Clientes -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Clientes</div>
                    <div class="card-body">
                        <h5 class="card-title">Total de Clientes</h5>
                        <p class="card-text"><?php echo $total_clientes; ?> clientes registrados.</p>
                    </div>
                </div>
            </div>

            <!-- Card 6 - Proveedores -->
            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">Proveedores</div>
                    <div class="card-body">
                        <h5 class="card-title">Total de Proveedores</h5>
                        <p class="card-text"><?php echo $total_proveedores; ?> proveedores registrados.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  </div>

  

</body>

</html>