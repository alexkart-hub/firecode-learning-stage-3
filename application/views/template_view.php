<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=cyrillic" rel="stylesheet"> -->
    <link href="css/css.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="css/jquery-ui.css">

    <title>Stage 3</title>
    <link rel="stylesheet" href="css/style.css?<?= time(); ?>">
</head>

<body>
    <div class="popup-fade">
        <div class="popup">
            <p><span>Спасибо за заявку!</span></p>
            <a class="popup-close" href="#">
                <i class="fas fa-times"></i>
            </a>
            <p>Спасибо за Вашу заявку. Наш менеджер свяжется с Вами в ближайшее время!</p>
        </div>
    </div>
    <header class="header">
        <div class="header_top bg-blue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-10 col-9 offset-1 offset-lg-0 offset-md-0 header_logo align-self-center text-md-left text-center pt-0 pt-md-3">
                        <img src="img/logo.png" alt="">
                    </div>
                    <!-- /.col-md-3 logo -->
                    <div class="col-lg-4 col-md-5 d-md-block d-none locations bg-blue text-center pr-0">
                        <div class="header_top_adress_first mt-5">
                            г. Ростов-на-Дону, Шаумяна, 73
                        </div>
                        <div class="header_top_adress_second">
                            г. Волгодонск, ул. Энтузиастов, 13
                        </div>
                    </div>
                    <!-- /.col-md-4 locations -->
                    <div class="col-lg-2 col-md-4 d-md-block d-none phones bg-blue text-center">
                        <div class="header_top_phone_first mt-5">
                            +7 (863) 229-81-82
                        </div>
                        <div class="header_top_phone_second">
                            +7 (8639) 24-79-79
                        </div>
                    </div>
                    <!-- /.col-md-2 phones -->
                    <?php if($data['view'] != 'admin'): ?>
                    <div class="col-lg-3  d-lg-block d-none calc bg-blue text-md-left wrap_btn">
                        <a href="#" class="btn px-0"><i class="fas fa-calculator"></i>Калькулятор онлайн</a>
                    </div>
                    <div class="col-sm-1 col-2 d-block d-md-none calc-collaps">
                        <a href="#" class="btn"><i class="fas fa-calculator"></i></a>
                    </div>
                    <!-- /.col-md-3 calc -->
                    <?php else:?>
                        <div class="col-lg-3  d-lg-block d-none calc bg-blue text-md-left wrap_btn">
                        <p class="mt-5 mb-0 text-right">Здравствуйте, <?=$_COOKIE['login']; ?>!</p>
                        <p class="logout text-right">
                            <a href="logout">Выйти</a>
                        </p>
                    </div>
                        
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php if($data['view'] != 'admin'): ?>
        <div class="header_bottom">
            <div class="container pl-0">
                <nav class="navbar navbar-expand-md">
                    <button class="navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icont"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active"><a class="nav-link" href="#">О нас</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Каталог</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Услуги</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">ЦЕНЫ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">КОНСТРУКЦИИ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">АКЦИИ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">НАШИ РАБОТЫ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">КОНТАКТЫ</a></li>
                        </ul>

                    </div>
                </nav>

            </div>
        </div>
        <!-- /.row header_bottom -->
        <?php endif;?>
    </header>
    <!-- /header -->
    
    <!-- ====================== Content ============================== -->
    <?php include 'application/views/' . $content_view; ?>
    <!-- ====================== /Content ============================= -->

    <footer class="footer">
        <!-- < class="navbar navbar-expand-lg"> -->

        <div class="container">
            <!-- <nav class="navbar"> -->
            <div class="row  justify-content-between">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <nav class="navbar navbar-expand-lg">
                        <div class="wrap_header">
                            <a href="#" class="nav-link header">Компания</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler1" aria-controls="navbarToggler1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fas fa-angle-double-down"></i></span>
                            </button>
                        </div>

                        <ul class="nav navbar-nav flex-column collapse navbar-collapse" id="navbarToggler1">

                            <li class="nav-item">
                                <a class="nav-link active" href="#">О нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Цены</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Акции</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Наши работы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Гарантия</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Калькулятор</a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <!-- /.col-lg-2 -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <nav class="navbar navbar-expand-lg">
                        <div class="wrap_header">
                            <a href="#" class="nav-link header">Каталог потолков</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler2" aria-controls="navbarToggler2" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fas fa-angle-double-down"></i></span>
                            </button>
                        </div>
                        <ul class="nav navbar-nav flex-column collapse navbar-collapse" id="navbarToggler2">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Глянцевые</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Матовые</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Сатиновые</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">С фотопечатью</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Звездное небо</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Художественные</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /.col-lg-2 -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <nav class="navbar navbar-expand-lg">
                        <div class="wrap_header">
                            <a href="#" class="nav-link header">Услуги</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler3" aria-controls="navbarToggler3" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fas fa-angle-double-down"></i></span>
                            </button>
                        </div>
                        <ul class="nav navbar-nav flex-column collapse navbar-collapse" id="navbarToggler3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Установка натяжных потолков</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Двухуровневые потолки</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Потолки с подвеской</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ремонт потолков</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /.col-lg-2 -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <nav class="navbar navbar-expand-lg">
                        <div class="wrap_header">
                            <a href="#" class="nav-link header">Конструкции</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler4" aria-controls="navbarToggler4" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i class="fas fa-angle-double-down"></i>
                                </span>
                            </button>
                        </div>
                        <ul class="nav navbar-nav flex-column collapse navbar-collapse" id="navbarToggler4">

                            <li class="nav-item">
                                <a class="nav-link active" href="#">Одноуровневые</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Двухуровневые</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Многоуровневые</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- /.col-lg-2 -->
                <div class="col-lg-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-4 wrapUkon text-lg-left text-center">
                                <img src="img/Siluet.png" class="siluet" alt="siluet.png">
                                <p class="ukon">Юкон <br><span> натяжные потолки</span></p>
                            </div>
                            <div class="col-lg-12 col-md-4 adress text-lg-left text-center">
                                <p>г. Ростов-на-Дону, Шаумяна, 73</p>
                                <p> +7 (863) 229-81-82</p>
                            </div>
                            <div class="col-lg-12 col-md-4 adress text-lg-left text-center">
                                <p>г. Волгоград, Шаумяна, 73</p>
                                <p> +7 (863) 229-81-82</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="container-fluid line">
        </div>
        <div class="container">
            <div class="row justify-content-around align-items-center footer_line">
                <div class="col-md-6 col-12 text-md-left text-center">
                    ООО “ИТ-Групп”
                </div>
                <div class="col-md-6 col-12 text-md-right text-center">
                    <a href="#">Создание сайта - ЕВРОСАЙТЫ</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.footer -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src="js/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/276549fad6.js" crossorigin="anonymous"></script> -->
    <script src="js/276549fad6.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="js/jquery-1.12.4.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nice-select.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script src="js/files.js"></script>
    <script src="js/ajaxQuerys.js"></script>
</body>

</html>