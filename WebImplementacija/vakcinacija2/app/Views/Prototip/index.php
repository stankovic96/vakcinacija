<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <title>Вакцинација</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css")?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row" id="header">
            <div class="col-4">
                <img src="<?php echo base_url("assets/slike/logo.png")?>" alt="Logo" id="logo1">
            </div>
            <div class="col-8">
                <nav class="nav">
                    <a href="#" class="nav-link active">Почетна</a>
<!--                    <a href="registracija.html" class="nav-link">Registracija</a>-->
                    <?= anchor("Gost/registracija", "Registracija", 'class = "nav-link"') ?>
                    <a href="prijava.html" class="nav-link">Пријава</a>
                    <a href="opisi.html" class="nav-link">О вакцинама</a>
                    <a href="statistika.html" class="nav-link">Статистика</a>
                </nav>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-12 col-md-2 remove-padding" id="levi-deo">
                <ul class="breadcrumb remove-margin" id="putokaz">
                    <li class="breadcrumb-item"><a href="index.html">Почетна</a></li>
                </ul>
                <nav class="nav flex-column" id="vertikalni-meni">
                    <a href="index.html" class="nav-link active">Почетна</a>
                    <a href="registracija.html" class="nav-link">Регистрација</a>
                    <a href="prijava.html" class="nav-link">Пријава</a>
                    <a href="opisi.html" class="nav-link">О вакцинама</a>
                    <a href="statistika.html" class="nav-link">Статистика</a>
                </nav>
                <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
            </div>
            <div class="col-12 col-md-8 remove-padding" id="glavni-sadrzaj">
                <div id="galerija" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#galerija" data-slide-to="0" class="active"></li>
                        <li data-target="#galerija" data-slide-to="1"></li>
                        <li data-target="#galerija" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php echo base_url("assets/slike/vaccine_1.jpg");?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo base_url("assets/slike/vaccine_2.jpg");?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo base_url("assets/slike/vaccine_3.jpg");?>" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#galerija" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#galerija" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div style="padding: 2%; text-align: justify;">
                    <p>
                        Овај сајт служи да олакша грађанима пријаву за вакцинацију и да грађанима на увид све релевантне информације у вези вакцинације.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-2 remove-padding text-center" id="baneri">
                <a href="https://www.pfizer.com/">
                    <img src="<?php echo base_url("assets/slike/pfizer.png")?>" alt="Pfizer" class="img-fluid">
                </a>
                <a href="http://www.sinopharm.com/1156.html">
                    <img src="<?php echo base_url("assets/slike/sinopharm.png")?>" alt="Sinopharm" class="img-fluid">
                </a>
                <a href="https://www.astrazeneca.com/">
                    <img src="<?php echo base_url("assets/slike/astrazenece.png")?>" alt="AstraZeneca" class="img-fluid">
                </a>
                <a href="https://sputnikvaccine.com/">
                    <img src="<?php echo base_url("assets/slike/sputnik.svg")?>" alt="Sputnik" class="img-fluid" style="background-color: rgb(28, 113, 119);">
                </a>
            </div>
        </div>
        <div class="row text-center" id="footer">
            <div class="col-12">
                Copyright 2020, Марко Станковић, Недим Јукић и Никола Милосављевић, Одсек за софтверско инжењерство Електротехничког факултета Универзитета у Београду
            </div>
        </div>
    </div>
</body>
</html>