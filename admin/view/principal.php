<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Bienvenido <strong><?= $nombre_usuario . " " . $apellidos ?></strong>
            </h1>
        </div>
        <?php
        if ($password_bd == $pass_c) { ?>
            <div class="alert alert-danger" role="alert">
                Cambia tu contraseña
            </div>
        <?php } ?>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Número de Usuarios</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $numUser ?></div>
                            </div>
                            <div class="col-auto">
                                <h2>
                                    <i class="bi bi-people fa-2x text-gray-300"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Número de Plantas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numPlant ?></div>
                            </div>
                            <div class="col-auto">
                                <h2>
                                    <i class="bi bi-geo-alt fa-2x text-gray-300"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Plantas Inactivas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numDanger ?></div>
                            </div>
                            <div class="col-auto">
                                <h2>
                                    <i class="bi bi-radioactive fa-2x text-gray-300"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Plantas Activas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sqlActive ?></div>
                            </div>
                            <div class="col-auto">
                                <h2>
                                    <i class="bi bi-bar-chart fa-2x text-gray-300"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->

        <div class="row">
            <?php
            $datos = array(
                "Ultimo dia" => $sqlDias,
                "Ultimo mes" => $sqlMeses,
                "Ultimo anio" => $sqlAnio,
            );

            ?>

            <div class="col-xl-7 col-lg-5">
                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Echinocactus platyacanthus</h6>
                    </div>
                    <div class="card-body">
                        <div class="">

                            <script>
                                var datos = <?php echo json_encode($datos); ?>;
                            </script>

                            <canvas id="grafico"></canvas>
                            <script>
                                var datos = <?php echo json_encode($datos); ?>;
                                var ctx = document.getElementById('grafico').getContext('2d');
                                var grafico = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: Object.keys(datos),
                                        datasets: [{
                                            data: Object.values(datos),
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.8)',
                                                'rgba(54, 162, 235, 0.8)',
                                                'rgba(255, 206, 86, 0.8)',
                                                'rgba(75, 192, 192, 0.8)'
                                            ]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                        <hr>
                        Resultados de recolecta de registros por el paso del tiempo.
                    </div>
                </div>
                <!-- tabla -->
            </div>


            <div class="col-xl-5 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Echinocactus platyacanthus</h6>
                    </div>

                    <div class="card-body">

                        <div>
                            <?php
                            $lenguajes = array("Numero de biznagas", "De baja", "Activas");
                            $valores = array($numPlant, $numDanger, $sqlActive);
                            // Convertir los arrays a un string de JavaScript
                            $datos_lenguajes = json_encode($lenguajes);
                            $datos_valores = json_encode($valores);
                            ?>
                            <script type="text/javascript">
                                // Insertar aquí el script de JavaScript
                                // JavaScript
                                // Obtener los datos de PHP
                                var lenguajes = <?= $datos_lenguajes ?>;
                                var valores = <?= $datos_valores ?>;

                                // Cargar la librería de Google Charts
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });

                                // Llamar a la función que grafica
                                google.charts.setOnLoadCallback(drawChart);

                                // Función para graficar
                                function drawChart() {
                                    // Crear el objeto de datos
                                    var data = google.visualization.arrayToDataTable([
                                        ['Biznagas', 'Numeros'],
                                        [lenguajes[0], valores[0]],
                                        [lenguajes[1], valores[1]],
                                        [lenguajes[2], valores[2]]
                                       
                                    ]);

                                    // Configurar las opciones de la gráfica
                                    var options = {
                                        title: 'Biznagas activas, de baja y total de biznagas',
                                        width: 400,
                                        height: 400
                                    };

                                    // Crear la gráfica de columnas
                                    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

                                    // Dibujar la gráfica
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="chart_div"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>