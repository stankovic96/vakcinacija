<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
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
                <a href="#" class="nav-link">Početna</a>;
                <!--<a href="index.html" class="nav-link">Odjava</a>-->
                <?= anchor("Gradjanin/odjava", "Odjava", 'class = "nav-link"') ?>
                <?= anchor("Admin/Opisi", "O vakcinama", 'class = "nav-link"') ?>
                <?= anchor("Admin/Statistika", "Statistika", 'class = "nav-link"') ?>
            </nav>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-12 col-md-2 remove-padding" id="levi-deo">
            <ul class="breadcrumb remove-margin" id="putokaz">
                <li class="breadcrumb-item"><a href="#">Građanin</a></li>
            </ul>
            <nav class="nav flex-column" id="vertikalni-meni">
                <?= anchor("Gradjanin/prijavaVakcina", "Prijava za vakcinaciju", 'class = "nav-link"') ?>
               
            </nav>
            <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
        </div>
        <div class="col-12 col-md-8" id="glavni-sadrzaj">
            <p>Građanin: <?php echo $korisnik->getIme()." ".$korisnik->getPrezime();?> </p>
            <p>JMBG: <?php echo $korisnik->getJmbg();?> </p>
            <?php
            if($korisnik->getStatusprijave() == "Zakazan"){
                echo "<p>Termin: ";
                echo $korisnik->getDatumt1()->format('d-m-Y');
                echo "</p>";
                if($korisnik->getIdmesta() != null){
                    echo "<p>Mesto vakcinacije: ".$korisnik->getIdmesta()->getNaziv()."</p>";
                }
                if($korisnik->getIdtipvakcine() != null){
                    echo "<p>Tip vakcine: ".$korisnik->getIdtipvakcine()->getNaziv()."</p>";
                }
                echo "<p>Status prijave: "."Uspešno ste se prijavili"."<p>";
                if($korisnik->getStatust1() != null && $korisnik->getStatust1() == "Uspesno"){
                    echo "Status vakcinacije: <font color = 'green'>Uspesno ste se vakcinisali</font>";
                }
                else{
                    echo "<br>Status vakcinacije: <font color = 'red'> Niste vakcinisani </font>";
                }
            }
            else{
                echo "<font color = 'red'>Niste se prijavili za vakcinaciju</font>";
            }

            if(!empty($greske['prijava'])){
                echo "<br><br><font color='red'>".$greske['prijava']."</font>";
            }
            ?>

            <!--                <p>Prijava poslana &lt;ovde staviti da li je prijava zabeležena&gt;</p>
                            <p>Vaš termin je: &lt;ovde staviti termin ako postoji&gt;</p>-->
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
