<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <title>Вакцинација</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row" id="header">
        <div class="col-4">
            <img src="assets/logo.png" alt="Logo" id="logo1">
        </div>
        <div class="col-8">
            <nav class="nav">
                <a href="index.html" class="nav-link">Почетна</a>
                <a href="index.html" class="nav-link">Одјава</a>
                <a href="opisi.html" class="nav-link">О вакцинама</a>
                <a href="statistika.html" class="nav-link">Статистика</a>
            </nav>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-12 col-md-2 remove-padding" id="levi-deo">
            <ul class="breadcrumb remove-margin" id="putokaz">
                <li class="breadcrumb-item"><a href="nadlezni.html">Надлежни за дом здравља</a></li>
                <li class="breadcrumb-item"><a href="vakcina_pristigla.html">Уношење пристиглих количина вакцина</a></li>
            </ul>
            <img src="assets/logo.png" id="logo2" alt="logo">
        </div>
        <div class="col-12 col-md-8" id="glavni-sadrzaj">
            <form action="<?= site_url("$controller/ispisKolicina") ?>">
                <div class="form-group">
                    <label for="tip">Тип вакцина</label>
                    <font color = "red"><?php
                        if(!empty($greske['tip']))
                            echo "&nbsp;".$greske['tip'];
                        else echo "*"?>
                    </font>

                    <select id="tip" class="form-control" name="tip">
                        <?php
                        echo "<option hidden>Izaberite tip vakcine</option>";
                        foreach($tipovi as $tip){
                            echo "<option>$tip</option>";
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="rok">Rok trajanja vakcina</label>
                    <font color = "red"><?php
                        if(!empty($greske['rok']))
                            echo "&nbsp;".$greske['rok'];
                        else echo "*"?>
                    </font>
                    <input id="rok" class="form-control" type="date" name="rok">
                </div>
                <div class="form-group">
                    <label for="broj">Broj pristiglih vakcina</label>
                    <font color = "red"><?php
                        if(!empty($greske['broj']))
                            echo "&nbsp;".$greske['broj'];
                        else echo "*"?>
                    </font>
                    <input id="broj" class="form-control" type="number" name="broj">
                </div>
                <button class="btn btn-success">Unesi</button>
            </form>
        </div>
        <div class="col-12 col-md-2 remove-padding text-center" id="baneri">
            <a href="https://www.pfizer.com/">
                <img src="assets/pfizer.png" alt="Pfizer" class="img-fluid">
            </a>
            <a href="http://www.sinopharm.com/1156.html">
                <img src="assets/sinopharm.png" alt="Sinopharm" class="img-fluid">
            </a>
            <a href="https://www.astrazeneca.com/">
                <img src="assets/astrazenece.png" alt="AstraZeneca" class="img-fluid">
            </a>
            <a href="https://sputnikvaccine.com/">
                <img src="assets/sputnik.svg" alt="Sputnik" class="img-fluid" style="background-color: rgb(28, 113, 119);">
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