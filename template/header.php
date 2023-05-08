<header>
    <style>
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: #000000;
            font-weight: bold;
        }

        .navbar-toggler {
            border: none;
            color: #000000;
        }

        .navbar-toggler:hover {
            color: #28a745;
            /* Color de éxito */
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .nav-item {
            position: relative;
        }

        .nav-item::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #000000;
            transition: width 0.3s ease;
        }

        .nav-item:hover::before {
            width: 100%;
        }

        .nav-link {
            color: #000000;
            padding: 10px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #28a745;
            /* Color de éxito */
        }
    </style>

    <body>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <h3><strong>SJX</strong></h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    SJX
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/sjx/principal">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/sjx/mapa">Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/sjx/galeria">Galería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/sjx/registros">Registros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/sjx/resultados">Resultados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/sjx/admin/index">Entrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



</header>