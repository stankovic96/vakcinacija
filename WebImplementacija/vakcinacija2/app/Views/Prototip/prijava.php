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
                    <a href="index.html" class="nav-link">Početna</a>
<!--                    <a href="registracija.html" class="nav-link">Registracija</a>-->
                    <?= anchor("Gost/registracija", "Registracija", 'class = "nav-link"') ?>
                    <a href="#" class="nav-link active">Prijava</a>
                    <a href="opisi.html" class="nav-link">O vakcinama</a>
                    <a href="statistika.html" class="nav-link">Statistika</a>
                </nav>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-12 col-md-2 remove-padding" id="levi-deo">
                <ul class="breadcrumb remove-margin" id="putokaz">
                    <li class="breadcrumb-item"><a href="#">Prijava</a></li>
                </ul>
                <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
            </div>
            <div class="col-12 col-md-8 mb-3" id="glavni-sadrzaj">
                <form  name = "prijava" action = "<?= site_url("Gost/prijavaSubmit") ?>" method = "post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" class="form-control" type="text" name="email" value="<?= set_value('email') ?>">
                        <font color = "red"><?php if(!empty($greske['email']))
                            echo $greske['email'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="lozinka">Lozinka</label>
                        <input id="lozinka" class="form-control" type="password" name="lozinka">
                        <font color = "red"><?php if(!empty($greske['lozinka']))
                            echo $greske['lozinka'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="tip">Tip korisnika</label>
                        <select id = "tip" name = "tip" class = "form-control">
                            <option>Izaberite tip</option>
                            <option>Admin</option>
                            <option>Lekar</option>
                            <option>Sestra</option>
                            <option>Gradjanin</option>
                        </select>
                        <font color = "red"><?php if(!empty($greske['tip']))
                            echo $greske['tip'];?></font>
                    </div>
                    <button type="submit" class="btn btn-success">Prijavi se</button>
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