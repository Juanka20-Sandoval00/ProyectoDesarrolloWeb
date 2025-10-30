<?php
require_once 'db.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=ventas_mes.csv');

$output = fopen('php://output', 'w');

// encabezados de columnas
fputcsv($output, ['Fecha','ID_Orden','Total_a_Pagar']);

// query ventas del mes actual
$sql = "
    SELECT o.Fecha, o.ID_Orden, f.Total_a_Pagar
    FROM Orden o
    JOIN Factura_Orden_Mesa f ON f.ID_Orden = o.ID_Orden
    WHERE o.Estado='Pagada'
    AND MONTH(o.Fecha)=MONTH(CURDATE())
    AND YEAR(o.Fecha)=YEAR(CURDATE())
    ORDER BY o.Fecha ASC
";
$res = $conn->query($sql);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        fputcsv($output, [
            $row['Fecha'],
            $row['ID_Orden'],
            $row['Total_a_Pagar']
        ]);
    }
}

fclose($output);
exit;
