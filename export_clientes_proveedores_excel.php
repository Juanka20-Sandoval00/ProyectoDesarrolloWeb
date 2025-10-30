<?php
require_once 'db.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=clientes_proveedores.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['Tipo','Nombre','Telefono','Correo']);

$sql = "
    SELECT 'CLIENTE' AS Tipo, Nombre, Telefono, Correo 
    FROM Cliente
    UNION ALL
    SELECT 'PROVEEDOR' AS Tipo, Nombre, Telefono, Correo 
    FROM Proveedor
";
$res = $conn->query($sql);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        fputcsv($output, [
            $row['Tipo'],
            $row['Nombre'],
            $row['Telefono'],
            $row['Correo']
        ]);
    }
}
fclose($output);
exit;
