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
<!--                    <a href="index.php" class="nav-link">Početna</a>-->
                    <?= anchor("Gost", "Početna", 'class = "nav-link"') ?>
                    <a href="#" class="nav-link active">Registracija</a>
                    <!--<a href="prijava.html" class="nav-link">Prijava</a>-->
                    <?= anchor("Gost/prijava", "Prijava", 'class = "nav-link"') ?>
                    <a href="opisi.html" class="nav-link">O vakcinama</a>
                    <a href="statistika.html" class="nav-link">Statistika</a>
                </nav>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-12 col-md-2 remove-padding" id="levi-deo">
                <ul class="breadcrumb remove-margin" id="putokaz">
                    <li class="breadcrumb-item"><a href="#">Registracija</a></li>
                </ul>
                <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
            </div>
            <div class="col-12 col-md-8" id="glavni-sadrzaj">
                <form class = "mb-3" name = "registracija" action = "<?= site_url("Gost/registracijaSubmit") ?>" method = "post">
                    <div class="form-group">
                        <label for="ime">Ime <font color = "red">*</font></label>
                        <input id="ime" class="form-control" type="text" name="ime" value="<?= set_value('ime') ?>" >
                        <font color = "red"><?php if(!empty($greske['ime']))
                            echo $greske['ime'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="prezime">Prezime <font color = "red">*</font></label>
                        <input id="prezime" class="form-control" type="text" name="prezime" value="<?= set_value('prezime') ?>" >
                        <font color = "red"><?php if(!empty($greske['prezime']))
                            echo $greske['prezime'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="jmbg">JMBG <font color = "red">*</font></label>
                        <input id="jmbg" class="form-control" type="text" name="jmbg">
                        <font color = "red"><?php if(!empty($greske['jmbg']))
                            echo $greske['jmbg'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail<font color = "red">*</font></label>
                        <input id="email" class="form-control" type="text" name="email" value="<?= set_value('email') ?>" >
                        <font color = "red"><?php if(!empty($greske['email']))
                            echo $greske['email'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="lozinka">Lozinka <font color = "red">*</font></label>
                        <input id="lozinka" class="form-control" type="password" name="lozinka">
                        <font color = "red"><?php if(!empty($greske['lozinka']))
                            echo $greske['lozinka'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="potvrda">Potvrda lozinke <font color = "red">*</font></label>
                        <input id="potvrda" class="form-control" type="password" name="potvrda">
                        <font color = "red"><?php 
                            if(!empty($greske['potvrda']))
                                echo $greske['potvrda'];
//                            else if($nePodudara != null)
//                                echo $nePodudara;
                            ?></font>
                    </div>
<!--                    <div class="form-group">
                        <label for="mesto">Mesto <font color = "red">*</font></label>
                        <input id="mesto" class="form-control" type="text" name="mesto">
                        <select id="mesto" class = "form-control" name="mesto">
                            <?php 
//                                echo "<option>Izaberite mesto</option>";
//                                foreach($gradovi as $grad){
//                                    echo "<option>$grad</option>";
//                                }
                            ?> 
                        </select>
                        <font color = "red"><?php// if(!empty($greske['mesto']))
                            //echo $greske['mesto'];?></font>
                    </div>-->
                    <div class="form-group">
                        <label for="adresa">Adresa <font color = "red">*</font></label>
                        <input id="adresa" class="form-control" type="text" name="adresa">
                        <font color = "red"><?php if(!empty($greske['adresa']))
                            echo $greske['adresa'];?></font>
                    </div>
                    <div class="form-group">
                        <label for="broj">Broj telefona</font></label>
                        <input id="broj" class="form-control" type="text" name="broj">
                        <font color = "red"><?php if(!empty($greske['broj']))
                            echo $greske['broj'];?></font>
                    </div>
                    <button type="submit" class="btn btn-success">Registruj se</button>
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