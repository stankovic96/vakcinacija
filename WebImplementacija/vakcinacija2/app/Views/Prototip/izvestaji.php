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
                
            </div>
            <div class="col-8">
                <nav class="nav">
                    <?= anchor("Lekar/pocetnaStranica", "Pocetna", 'class = "nav-link active"') ?>
                    <?= anchor("Lekar/odjava", "Odjava", 'class = "nav-link active"') ?>
                    <a href="opisi.html" class="nav-link">О вакцинама</a>
                    <a href="statistika.html" class="nav-link">Статистика</a>
                </nav>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-12 col-md-2 remove-padding" id="levi-deo">
                <ul class="breadcrumb remove-margin" id="putokaz">
                    <li class="breadcrumb-item"><?= anchor("Lekar/pocetniPrikazUnosenjaNezeljeneReakcijeBezGreske", "Napravi izvestaj", 'class = "nav-link"') ?></li>
                </ul>
                <img src=<?php echo base_url("assets/slike/logo.png")?> id="logo2" alt="logo" style ="width:100%;">
            </div>
            <div class="col-12 col-md-8 remove-padding" id="glavni-sadrzaj">
                <table class="table">
                    <thead class="thead-dark">
                        <th>Lekar</th>
                        <th>Gradjanin</th>
                        <th>Vakcina koju je primio</th>
                        <th>Dijagnoza</th>
                    </thead>
                    <tbody>
                    <?php 
                    for($i = 0; $i < (int)$broj;$i++){
                        echo "<tr> <td> $lekari[$i] </td><td> $gradjanini[$i] </td><td> $vakcine[$i] </td><td> $dijagnoze[$i] </td></tr>";
                    }
                    ?>
                    </tbody>
                    <tbody>
                </table>
            </div>
            <div class="col-12 col-md-2 remove-padding text-center" id="baneri">
                <a href="https://www.pfizer.com/">
                    <img src=<?php echo base_url("assets/slike/pfizer.png")?> alt="Pfizer" class="img-fluid">
                </a>
                <a href="http://www.sinopharm.com/1156.html">
                    <img src=<?php echo base_url("assets/slike/sinopharm.png")?> alt="Sinopharm" class="img-fluid">
                </a>
                <a href="https://www.astrazeneca.com/">
                    <img src=<?php echo base_url("assets/slike/astrazenece.png")?> alt="AstraZeneca" class="img-fluid">
                </a>
                <a href="https://sputnikvaccine.com/">
                    <img src=<?php echo base_url("assets/slike/sputnik.svg")?> alt="Sputnik" class="img-fluid" style="background-color: rgb(28, 113, 119);">
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