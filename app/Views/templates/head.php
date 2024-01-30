<!DOCTYPE html>
<html lang="de" class="h-100">
<head>

    <meta charset="UTF-8">
    <title>Startseite</title>


    <!-- Bootstrap -->
    <link href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- FontAwesome -->
    <link href="https://unpkg.com/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet"/>


    <script src="https://unpkg.com/jquery@3.6.1/dist/jquery.min.js"></script>




    <!-- Bootstrap Table -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css">
    <script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>


    <!-- STylesheet -->

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>style.css">

</head>

<body class="d-flex flex-column h-100">


<!-- NavBar-->

<nav class="navbar navbar-dark navbar-expand-md navbar-dark bg-header-1 bg-header-2 px-0 py-0 pb-1 mb-3">
    <div class="container-fluid">

        <a class="navbar-brand m-2" href="<?= base_url('Tasks/Startseite') ?>">
            <img src="<?= base_url('') ?>/06_-_WE_Logo.svg"" alt="" height="auto" width="20vw">
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('Tasks/Startseite') ?>" class="nav-link" id="Active">Tasks</a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('Boards/Boardsseite') ?>" class="nav-link">Boards</a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('Spalten/Spaltenseite') ?>" class="nav-link">Spalten</a>
                </li>
            </ul>
        </div>
    </div>
</nav>