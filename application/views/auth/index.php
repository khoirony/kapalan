<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link href="<?= base_url('assets/'); ?>css/homepage.css" rel="stylesheet">
    <title>Kapalan</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
        <div class="container border-bottom">
            <img src="https://procurementdmom.site/nav/white-left.png" class="h-12 mr-3" alt=""><img src="https://procurementdmom.site/nav/white-mid.png" class="h-12" alt=""><img src="https://procurementdmom.site/nav/white-right.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white h3" aria-current="page" href="<?= base_url('Auth'); ?>">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron border-0 rounded-0">
        <div class="container">
            <div class="row" style="margin-top: 200px;">
                <div class="col-7">
                    <h1 class="display-3 font-weight-bold mt-5 text-white"><span class="fw-bold">Shiprepair Dmom</span></h1>
                    <p class="text-white mt-4" style="font-size: 25px;">we provide services to bridge the shipowners and shipyards in the ship repair process in an integrated platform</p>
                </div>
            </div>

        </div>
    </div>
    <footer>
        <div class="container bg-white text-center pb-4">
            This website is used for the prototype of undergraduate thesis in Digital Marine Operations and Maintenance Laboratory.
        </div>
    </footer>
</body>

</html>