<?php include 'SideBarEmpleado.php'; ?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedidos</title>
    <link rel="stylesheet" href="CSS/styles.css" />
    <meta name="theme-color" content="#4E2A1A" />
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">
    <!-- ==================== Ordenes y Entregas a Domicilio ==================== -->
    <main class="container mx-auto p-8 ml-64">
        <h2 class="text-2xl font-bold text-[#4E2A1A] mb-6">Órdenes</h2>

        <div class="grid grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <div class="text-3xl font-semibold text-[#F2992E]">38</div>
                <div class="text-sm text-gray-600">Órdenes activas</div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 text-center">
                <div class="text-3xl font-semibold text-[#F2992E]">Q 1,245</div>
                <div class="text-sm text-gray-600">Ventas del día</div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 text-center">
                <div class="text-3xl font-semibold text-[#F2992E]">12 / 24</div>
                <div class="text-sm text-gray-600">Mesas ocupadas</div>
            </div>

            <div class="bg-white rounded-lg shadow p-4 text-center">
                <div class="text-3xl font-semibold text-[#F2992E]">58</div>
                <div class="text-sm text-gray-600">Clientes atendidos</div>
            </div>
        </div>

        <!-- Tabla de órdenes -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-[#F2E3D5]">
                    <tr class="text-left text-[#4E2A1A]">
                        <th class="py-3 px-4 font-semibold">#</th>
                        <th class="py-3 px-4 font-semibold">Mesa</th>
                        <th class="py-3 px-4 font-semibold">Cliente</th>
                        <th class="py-3 px-4 font-semibold text-right">Total</th>
                        <th class="py-3 px-4 font-semibold text-right">Estado</th>
                        <th class="py-3 px-4 font-semibold text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-t border-[#E5D5C5] hover:bg-[#FFF9F3]">
                        <td class="py-3 px-4">1245</td>
                        <td class="py-3 px-4">M-05</td>
                        <td class="py-3 px-4">Pérez</td>
                        <td class="py-3 px-4 text-right">Q 165.00</td>
                        <td class="py-3 px-4 text-right">Preparando</td>
                        <td class="py-3 px-4 text-right">
                            <button class="text-[#4E2A1A] hover:text-[#F2992E] font-semibold">Ver</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
