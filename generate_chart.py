import mysql.connector
import matplotlib.pyplot as plt

# Conectar a la base de datos MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="local_bebidas"
)
cursor = conn.cursor()

# Consultar datos de ventas
cursor.execute("SELECT fecha_venta, total FROM ventas")
datos = cursor.fetchall()

# Crear gráfica
fechas = [fila[0] for fila in datos]
totales = [fila[1] for fila in datos]

plt.figure(figsize=(10, 6))
plt.plot(fechas, totales, marker='o')
plt.title('Ventas por Fecha')
plt.xlabel('Fecha')
plt.ylabel('Total Ventas')

# Guardar gráfica como imagen
plt.savefig('/opt/lampp/htdocs/bar_administrate/img/chart.png')
