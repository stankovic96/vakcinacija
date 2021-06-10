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

        </div>
        <div class="col-8">
            <nav class="nav">
                <?= anchor("Lekar/pocetnaStranica", "Pocetna", 'class = "nav-link active"') ?>
                <?= anchor("Lekar/odjava", "Odjava", 'class = "nav-link"') ?>
                <?= anchor("Admin/Opisi", "O vakcinama", 'class = "nav-link"') ?>
                <?= anchor("Admin/Statistika", "Statistika", 'class = "nav-link"') ?>
            </nav>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-12 col-md-2 remove-padding" id="levi-deo">
            <ul class="breadcrumb remove-margin" id="putokaz">
                <li class="breadcrumb-item"><?= anchor("Lekar/pocetniPrikaz", "Izvestaji gradjana", 'class = "nav-link"') ?></li>
            </ul>
            <img src=<?php echo base_url("assets/slike/logo.png")?> id="logo2" alt="logo" style ="width:100%;">
        </div>
        <div class="col-12 col-md-8" id="glavni-sadrzaj">
            <form action="<?= site_url("Lekar/unosNezeljenihRekacija") ?>">
                <div class="form-group">
                    <label for="jmbg">JMBG pacijenta</label> <font color = "red">*</font></label>
                    <input id="jmbg" class="form-control" type="text" name="nazivJMBG">
                    <font color = "red"><?php if(!empty($greske['nazivJMBG']))
                            echo $greske['nazivJMBG'];?></font>
                </div>
                <div class="form-group">
                    <label for="vakcinaTip">Tip vakcine <font color = "red">*</font></label>
                    <!--<input id="mesto" class="form-control" type="text" name="mesto">-->
                    <select id="mesto" class = "form-control" name="tipVakcine">
                        <?php
                        echo "<option hidden>Izaberite tip vakcine</option>";
                        foreach($tipovi as $tip){
                            echo "<option>$tip</option>";
                        }
                        ?>
                    </select>
                    <font color = "red"><?php if(!empty($greske['tipVakcine']))
                            echo $greske['tipVakcine'];?></font>
                </div>
                <div class="form-group">
                    <label for="nezeljene_reakcije">Nezeljene reakcije (uneti u formatu: NezeljenaReakcija1, NezeljenaReakcija2, ...)</label><font color = "red">*</font></label>
                    <textarea id="nez_reakcije" class="form-control" name="nezeljeneReakcije" rows="6"></textarea>
                    <font color = "red"><?php if(!empty($greske['nezeljeneReakcije']))
                            echo $greske['nezeljeneReakcije'];?></font>
                </div>
                <div class="form-group">
                    <label for="izvestaj">Tekst izvestaja </label><font color = "red">*</font></label>
                    <textarea id="izvestaj" class="form-control" name="tekstIzvestaj" rows="6"></textarea>
                    <font color = "red"><?php if(!empty($greske['tekstIzvestaj']))
                            echo $greske['tekstIzvestaj'];?></font>
                </div>
                <button class="btn btn-success">Kreiraj izvestaj</button>
                <font color = "green"><?php if(!empty($uspeh))
                        echo "$uspeh";?></font>
            </form>
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
                Copyright 2020, Marko Stanković, Nedim Jukić i Nikola Milosavljević, Odsek za softversko inžinjerstvo Elektrotehničkog fakulteta Univerziteta u Beogradu
        </div>
    </div>
</div>
</body>
</html>