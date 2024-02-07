

<!-- Tasks Menu -->
<nav class=" navbar navbar-expand-lg navbar-dark bg-header-1 bg-header-2 px-0 py-1 mb-2 flex-grow-0 " role="navigation">
    <div class="container-fluid justify-content">
        <button class="navbar-toggler color-white ms-2 ms-md-0 d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <a class="nav-link ps-0 pe-0" href="#">
                <i class="fas fa-bars" style="color: white;"></i>
                <span class="text-white"></span>
            </a>
        </button>
        <div id="navbarContent" class="collapse navbar-collapse  d-lg-none ms-2 ms-md-0 p-2 ">
            <ul class="navbar-nav mr-auto ms-2 ms-md-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link text-white py-0 " href="<?= base_url('Tasks/Startseite') ?>">
                        <i class="fas fas fa-solid fa-clipboard-check text-sx icon-main-menu"></i><span class="">  Tasks</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white py-0" href="<?= base_url('Boards/Boardsseite') ?>">
                        <i class="fas fas fa-solid fa-clipboard-check text-sx icon-main-menu"></i><span class="">  Boards</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white py-0" href="<?= base_url('Spalten/Spaltenseite') ?>">
                        <i class="fas fa-solid fa-table-columns text-sx icon-main-menu"></i><span class="">   Spalten</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
