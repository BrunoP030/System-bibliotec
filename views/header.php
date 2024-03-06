<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title; ?></title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="public/assets/favicon.ico" />

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/main.css" rel="stylesheet" />

    <!-- W3 -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="<?= URL; ?>public/MDB/css/mdb.min.css" />
    <link rel="stylesheet" href="<?= URL; ?>public/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="<?= URL; ?>public/css/main.css" />

</head>

<body>
    <!--========== HEADER ==========-->
    <header class="header" style="background: #0a3576;">
        <div class="header__container">
            <a href="#" class="header__logo" style="color: #FFE4B5;">Estrutura MVC</a>

            <a href="#" class="header__logo" style="color: #FFE4B5;" >Bruno Seisdedos Pires dos Santos</a>

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="<?=URL;?>index" class="nav__link nav__logo">
                    <i class='bx bx-home nav__icon'></i>
                    <span class="nav__logo-name">HOME</span>
                </a>
                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Profile</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profile</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="<?=URL;?>livrosalugados/index" class="nav__dropdown-item">Alugueis</a>
                                    <a href="<?=URL;?>livrodevolvido/index" class="nav__dropdown-item">Livros devolvidos</a>
                                    <a href="<?=URL;?>pendentes/index" class="nav__dropdown-item">Alugueis pendente</a>
                                </div>
                            </div>
                        </div>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Autor</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="<?=URL;?>autor/index" class="nav__dropdown-item">Cadastrar Autor</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Aluguel</h3>
                         
                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Aluguel</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="<?=URL;?>alugar/index" class="nav__dropdown-item">Alugar livro</a>
                                    <a href="<?=URL;?>devolver/index" class="nav__dropdown-item">Devolver livro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <div class="nav__items">
                        <h3 class="nav__subtitle">Cadastrar</h3>


                        </div>
                       
                        <a href="<?=URL;?>cadaluno/index" class="nav__link">
                        <i class="bx bx-user-plus"></i>
                            <span class="nav__name">Cadastro Aluno</span>
                        </a>
                        <a href="<?=URL;?>cadlivro/index" class="nav__link">
                            <i class='fas'>&#xf518;</i>
                            <span class="nav__name"> Cadastro livro</span>
                        </a>

                </div>
            </div>

            <a href="#" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>