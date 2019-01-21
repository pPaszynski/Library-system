<?php
//session_start();
//?>

<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<title> Employe panel </title>

<body>

<div id="container">
    <?php include(dirname(__DIR__) . '/logo.html') ?>
    <?php include(dirname(__DIR__) . '/menu.html') ?>
    <?php include(dirname(__DIR__) . '/topbar.html') ?>

    <div id="content" style="text-align: center">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand nav-link dropdown-toggle" style="font-size: 25px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
            <a class="navbar-brand nav-link" style="font-size: 25px; float: right" type="text" aria-haspopup="true" aria-expanded="false">Panel pracownika</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="?page=home">Home</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" type="button" onclick="logOut()">Wyloguj !</a>
            </div>
            <!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
            <!--                <span class="navbar-toggler-icon"></span>-->
            <!--            </button>-->

            <!--            <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
            <!--                <ul class="navbar-nav mr-auto">-->
            <!--                    <li class="nav-item dropdown">-->
            <!--                        <a id="cart-popover" class="btn" data-placement="bottom" title="Order Cart">-->
            <!--                            <span class="total_price">Cart</span>-->
            <!--                            <span class="glyphicon glyphicon-shopping-cart"></span>-->
            <!--                            <span class="badge">0</span>-->
            <!--                        </a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--            <form class="form-inline my-2 my-lg-0">-->
            <!--                <input class="form-control mr-sm-2" id="searchValue" type="text" onkeydown="search()" placeholder="Search" aria-label="Search">-->
            <!--                <button class="btn btn-outline-success my-2 my-sm-0" id="searchButton" type="button">Search</button>-->
            <!--            </form>-->
        </nav>


        <div id="display_employe_panel">

        </div>
    </div>
</div>
<?php include(dirname(__DIR__) . '/footer.html') ?>
</div>
</body>
</html>