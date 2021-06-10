<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url("assets/slike/logo.png")?>" type="image/x-icon">
    <title>Vakcinacija</title>
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
                <!--<a href="#" class="nav-link">Početna</a>-->
                <?= anchor("Sestra", "Početna", 'class = "nav-link"') ?>
                <!--<a href="index.html" class="nav-link">Одјава</a>-->
                <?= anchor("Sestra/odjava", "Odjava", 'class = "nav-link"') ?>
                <?= anchor("Admin/Opisi", "O vakcinama", 'class = "nav-link"') ?>
                <?= anchor("Admin/Statistika", "Statistika", 'class = "nav-link"') ?>
            </nav>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-12 col-md-2 remove-padding" id="levi-deo">
            <ul class="breadcrumb remove-margin" id="putokaz">
                <!--<li class="breadcrumb-item"><a href="sestra.html">Medicinska sestra</a></li>-->
                <li class="breadcrumb-item"><?= anchor("Sestra", "Medicinska sestra", 'class = "nav-link"') ?></li>
                <li class="breadcrumb-item"><a href="#">Validacija vakcinacije</a></li>
            </ul>
            <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
        </div>
        <div class="col-12 col-md-8 remove-padding " id="glavni-sadrzaj">
            <form class= "ml-3" method = "post" action = "<?= site_url("Sestra/pretraga") ?>">
                <div class="form-group">
                    <p>Uneti JMBG pacijenta</p>
                    <input class="form-control" type = "text" name = "pacijentJMBG" id = "pacijentJMBG">
                    <font color = "red">
                        <?php
                        if(!empty($greske['pacijentJMBG']))
                            echo $greske['pacijentJMBG'];
                        ?>
                    </font>
                </div>
                <button id="see_schedule" class="btn btn-success">Pretraga</button>

                <?php
                if(!empty($greske['pronasao'])){
                    echo "<br><font color = 'red'>".$greske['pronasao']."</font>";
                }
                ?>
            </form>
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
                Copyright 2020, Marko Stanković, Nedim Jukić i Nikola Milosavljević, Odsek za softversko inžinjerstvo Elektrotehničkog fakulteta Univerziteta u Beogradu
        </div>
    </div>
</div>
</body>
</html>
