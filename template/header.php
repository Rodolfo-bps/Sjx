<header>

    <body>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <h3><strong>SJX</strong></h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
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

<section id="hero">
    <duv class="container">
        <div class="content-center">
            <h1 class="mt-5" style="color: #000;">San Jerónimo Xayacatlán</h1>
            <p style="color: #000;"><?php echo $resultados[0]['nombre_blog']; ?></p>
        </div>
    </duv>
</section>