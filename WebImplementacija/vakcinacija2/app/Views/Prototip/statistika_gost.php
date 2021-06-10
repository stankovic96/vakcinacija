<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <title>Vakcinacija</title>
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
                <?= anchor("Gost/Opisi", "Opisi Vakcina", 'class = "nav-link"') ?>
                <?= anchor("Gost/Statistika", "Statistika Vakcina", 'class = "nav-link active"') ?>
            </nav>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-12 col-md-2 remove-padding" id="levi-deo">
         
            <img src="<?php echo base_url("assets/slike/logo.png")?>" id="logo2" alt="logo">
        </div>
        <div class="col-12 col-md-8 remove-padding" id="glavni-sadrzaj">
            <table class="table">
                <thead class="thead-dark">
                    <th>Име вакцине</th>
                    <th>Број примљених вакцина</th>
                    <th>Број нежељених реакција</th>
                    <th>Проценат нежељених реакција</th>
                </thead>
                <tbody>
                <?php
                foreach ($tipoviVakcina as $tip){
                    echo "<tr></tr><td>".$tip->getNaziv()."</td>";
                    echo "<td>".$tip->getKolicinavakcinisanih()."</td>";
                    echo "<td>".$tip->getBrojnezeljenih()."</td>";
                    if($tip->getKolicinavakcinisanih()&&$tip->getBrojnezeljenih()){
                        $x=floatval($tip->getKolicinavakcinisanih());
                        $y=floatval($tip->getBrojnezeljenih());
                        $odnos=$y/$x;
                        $odnos=$odnos*100;
                        echo "<td>".$odnos."%</td></tr>";
                    }else{
                        echo "<td></td></tr>";
                    }

                }
                ?>
                </tbody>
            </table>
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