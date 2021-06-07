<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <title>Вакцинација</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url("assets/css/style.css")?>">
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
                <?= anchor("/", "Pocetna", 'class = "nav-link"') ?>
                <?= anchor("Admin/odjava", "Odjava", 'class = "nav-link"') ?>
                <?= anchor("Admin/Opisi", "O vakcinama", 'class = "nav-link"') ?>
                <?= anchor("Admin/Statistika", "Statistika vakcina", 'class = "nav-link"') ?>

            </nav>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-12 col-md-2 remove-padding" id="levi-deo">
                
            <nav class="nav flex-column" id="vertikalni-meni">
                <!--<a href="vakcina_nova.html" class="nav-link active">Уношење новог типа вакцине</a>-->
                <?= anchor("Admin/NovaVakcina", "Unosenje novog tipa vakcine", 'class = "nav-link"') ?>
            </nav>
            <nav class="nav flex-column" id="vertikalni-meni">
                <?= anchor("Admin/unosNovihVakcina", "Unosenje nove ture vakcina", 'class = "nav-link"') ?>
            </nav>
            <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
        </div>
        <div class="col-12 col-md-8" id="glavni-sadrzaj">
            <p>Admin: <?php echo $korisnik->getIme()." ".$korisnik->getPrezime();?></p>
            <form class = "mb-3" name = "novaVakcina" action = "<?= site_url("Admin/NovaVakcinaSubmit") ?>" method = "post">
                <div class="form-group">
                    <label for="ime">Naziv vakcine</label>
                    <input id="ime" class="form-control" type="text" name="ime" value="<?= set_value('ime') ?>" >
                    <font color = "red"><?php if(!empty($greske['ime']))
                            echo $greske['ime'];?></font>
                </div>
                <div class="form-group">
                    <label for="opis">Opis vakcine</label>
                    <input id="opis" class="form-control" type="text" name="opis" value="<?= set_value('opis') ?>" >
                    <font color = "red"><?php if(!empty($greske['opis']))
                            echo $greske['opis'];?></font>
                </div>
                <button class="btn btn-success">Unesi</button>
                <font color = "green"><?php if(!empty($poruka))
                        echo $poruka[0];?></font>
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
            Copyright 2020, Марко Станковић, Недим Јукић и Никола Милосављевић, Одсек за софтверско инжењерство Електротехничког факултета Универзитета у Београду
        </div>
    </div>
</div>
</body>
</html>