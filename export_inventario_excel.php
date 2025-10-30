<?php
require_once 'db.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=inventario_actual.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['Ingrediente','Stock_Actual','Stock_Minimo']);

$sql = "
    SELECT ing.Nombre AS Ingrediente,
           i.Stock_Actual,
           i.Stock_Minimo
    FROM Inventario i
    JOIN Ingrediente ing ON ing.ID_Ingrediente = i.ID_Ingrediente
    ORDER BY ing.Nombre
";
$res = $conn->query($sql);
if ($res) {
    while ($row = $res->fetch_assoc()) {
        fputcsv($output, [
            $row['Ingrediente'],
            $row['Stock_Actual'],
            $row['Stock_Minimo']
        ]);
    }
}
fclose($output);
exit;
