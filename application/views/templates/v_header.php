<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title_page; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?> " rel="stylesheet">
    <link href="<?= base_url('assets/style.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('assets/pace.js'); ?>"></script>
    <link href="<?= base_url('assets/pace-theme.css'); ?>" rel="stylesheet">
    

</head>

<body>
    <div class="img">
        <img src="<?= base_url('assets/images/mainlogo.png'); ?>" class="img-fluid mx-auto d-block" alt="Logo Utama"
            style="max-width:300px">
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light static-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item <?= $navHomeStatus ?>">
                    <a class="nav-link" href="<?= site_url('/'); ?>">Home
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Environment News</a>
                </li>
                <li class="nav-item <?= $navDownloadStatus; ?> ">
                    <a class="nav-link" href="<?= site_url('home/downloadPage'); ?>">Download Apps</a>
                </li>
                <li class="nav-item <?= $navLogStatus ?> ">
                    <a class="nav-link" href="<?= site_url('auth'); ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>