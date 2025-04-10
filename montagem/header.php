<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Desafio Loomi - Portal de Notícias Customizado</title>
    <meta name="description"
        content="Este projeto é uma solução WordPress desenvolvida como parte do processo seletivo da Loomi, focada em desempenho, usabilidade e código limpo.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url" content="https://valtercarnauba.com.br/desafio-loomi/">
    <meta property="og:site_name" content="Desafio Loomi - Portal de Notícias Customizado">
    <meta property="og:type" content="websites" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:title" content="Desafio Loomi - Portal de Notícias Customizado">
    <meta property="og:description"
        content="Este projeto é uma solução WordPress desenvolvida como parte do processo seletivo da Loomi, focada em desempenho, usabilidade e código limpo.">
    <meta property="og:image" content="assets/img/logotipo.svg">
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:title" content="Desafio Loomi - Portal de Notícias Customizado">
    <meta name="twitter:description"
        content="Este projeto é uma solução WordPress desenvolvida como parte do processo seletivo da Loomi, focada em desempenho, usabilidade e código limpo.">
    <meta name="twitter:image" content="assets/img/logotipo.svg">
    <meta name="msapplication-TileImage" content="assets/img/logotipo.svg">
    <link rel="shortcut icon" href="assets/img/favicon/favicon.webp">
    <link rel="apple-touch-icon" href="assets/img/favicon/icon.png">
    <link rel="author" type="text/plain" href="humans.txt" />
    <link rel="stylesheet" href="assets/css/bootstrap-5.3.5-dist.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/fancybox.min.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.scss?ver<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/style-media.scss?ver<?php echo time(); ?>">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a18d90c538.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <header id="topo">
        <div class="fdez-bg-nav-top">
            <div class="container">
                <nav id="fdez-nav-top" class="navbar navbar-expand-md">
                    <div class="container-fluid">
                        <a href="index.php" class="navbar-brand" title="Desafio Loomi - Portal de Notícias Customizado">
                            <img src="assets/img/midia/icon-if.svg"
                                alt="Desafio Loomi - Portal de Notícias Customizado">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Itaqui">Itaqui</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active nav-ativo" aria-current="page" href="#" title="IT Forum">IT
                                        Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Distrito Itaqui">Distrito Itaqui</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="IT Invest">IT Invest</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" title="Instituto Itaqui">Instituto Itaqui</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <nav id="fdez-menu-main" class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a href="index.php" class="navbar-brand" title="Desafio Loomi - Portal de Notícias Customizado">
                        <img src="assets/img/logotipo.svg" alt="Desafio Loomi - Portal de Notícias Customizado">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Notícias
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php">Todas as notícias</a></li>
                                    <li><a class="dropdown-item" href="#" title="Negócios">Negócios</a></li>
                                    <li><a class="dropdown-item" href="#" title="Liderança">Liderança</a></li>
                                    <li><a class="dropdown-item" href="#" title="CIO">CIO</a></li>
                                    <li><a class="dropdown-item" href="#" title="Carreira">Carreira</a></li>
                                    <li><a class="dropdown-item" href="#" title="Inteligência Artificial">Inteligência Artificial</a></li>
                                    <li><a class="dropdown-item" href="#" title="Cibersegurança">Cibersegurança</a></li>
                                    <li><a class="dropdown-item" href="#" title="Plataformas">Plataformas</a></li>
                                    <li><a class="dropdown-item" href="#" title="ESG">ESG</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Colunas
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" title="Action">Action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Another action">Another action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Something else here">Something else
                                            here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Inteligência
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" title="Action">Action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Another action">Another action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Something else here">Something else
                                            here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Revistas</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Videocasts
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" title="Action">Action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Another action">Another action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Something else here">Something else
                                            here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Eventos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" title="Action">Action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Another action">Another action</a></li>
                                    <li><a class="dropdown-item" href="#" title="Something else here">Something else
                                            here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-ativo" href="#"> HIT - Materiais</a>
                            </li>
                        </ul>

                        <div>
                            <!-- Botão de Login -->
                            <button class="btn-base d-flex">
                                <i class="fa-regular fa-user"></i>
                                <span>Login</span>
                            </button>
                        </div>
                        <div class="d-flex align-items-center gap-5">
                            <!-- Ícone de Busca -->
                            <i class="fas fa-search  d-lg-block d-none"></i>
                            <!-- Ícone de Imagens -->
                            <img src="assets/img/midia/icon-menu.svg" class="d-lg-block d-none" alt="ícone menu">
                        </div>
                    </div>
                </div>
            </nav>
        </div>

    </header><!-- /topo //-->

    <div id="conteudo" role="main">