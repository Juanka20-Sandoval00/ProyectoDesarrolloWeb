<?php
require_once 'db.php';

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
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Ventas del mes</title>
<style>
body {
  font-family: Arial, sans-serif;
  color:#333;
  padding:20px;
}
h1{
  font-size:18px;
  margin-bottom:10px;
}
table{
  border-collapse: collapse;
  width:100%;
  font-size:14px;
}
th,td{
  border:1px solid #999;
  padding:6px 8px;
  text-align:left;
}
th{
  background:#eee;
}
.total-row td{
  font-weight:bold;
  background:#fafafa;
}
</style>
</head>
<body>
<h1>Ventas del mes (<?php echo date('m/Y'); ?>)</h1>
<table>
<thead>
<tr>
  <th>Fecha</th>
  <th>Orden</th>
  <th>Total (Q)</th>
</tr>
</thead>
<tbody>
<?php
$totalGeneral = 0;
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $totalGeneral += $row['Total_a_Pagar'];
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['Fecha']).'</td>';
        echo '<td>'.htmlspecialchars($row['ID_Orden']).'</td>';
        echo '<td>Q '.number_format($row['Total_a_Pagar'],2).'</td>';
        echo '</tr>';
    }
}
?>
<tr class="total-row">
  <td colspan="2">TOTAL</td>
  <td>Q <?php echo number_format($totalGeneral,2); ?></td>
</tr>
</tbody>
</table>
</body>
</html>
