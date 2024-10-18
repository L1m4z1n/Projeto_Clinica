<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle Clinico</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Médicos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-medico">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Pacientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-paciente">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Consultas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-consultas">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-consultas">Listar</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="conteiner">
        <div class="row mt-3">
            <div class="col">
                <?php
                switch (@$_REQUEST['page']) {
                    case 'cadastrar-medico':
                        include('cadastrar-medico.php');
                        break;
                    case 'editar-medico':
                        include('editar-medico.php');
                        break;
                    case 'listar-medico':
                        include('listar-medico.php');
                        break;
                    case 'salvar-medico':
                        include('salvar-medico.php');
                        break;
                    
                

                    case 'cadastrar-paciente':
                        include('cadastrar-paciente.php');
                        break;
                    case 'editar-paciente':
                        include('editar-paciente.php');
                        break;
                    case 'listar-paciente':
                        include('listar-paciente.php');
                        break;
                    case 'salvar-paciente':
                        include('salvar-paciente.php');
                        break;
                  
                
                    case 'cadastrar-consultas':
                        include('cadastrar-consultas.php');
                        break;
                    case 'editar-consultas':
                        include('editar-consultas.php');
                        break;
                    case 'listar-consultas':
                        include('listar-consultas.php');
                        break;
                    case 'salvar-consultas':
                        include('salvar-consultas.php');
                        break;
                    default:
                        include('home.php');
                        break;
                    }

                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>