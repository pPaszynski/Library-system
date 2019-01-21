<?php
//session_start();
//?>

<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<title> Strona główna </title>

<body>

<div id="container">
    <?php include(dirname(__DIR__) . '/logo.html') ?>
    <?php include(dirname(__DIR__) . '/menu.html') ?>
    <?php include(dirname(__DIR__) . '/topbar.html') ?>

    <div id="content" style="text-align: center">
<!--        <nav class="navbar navbar-default" role="navigation">-->
<!--            <div class="container-fluid">-->
<!--                <div class="navbar-header">-->
<!--                    <a class="navbar-brand" style="width: 18rem;" href="?page=home">Home</a>-->
<!--                    <div id="navbar-nav" >-->
<!--                        <ul class="nav navbar-nav">-->
<!--                            <li>-->
<!--                                <a id="cart-popover" style="width: 80%" class="btn" data-placement="bottom" title="Order Cart">-->
<!--                                    <span class="glyphicon glyphicon-shopping-cart"></span>-->
<!--                                    <span class="badge"></span>-->
<!--                                    <span class="total_price">$ 2.00</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->
<!---->
<!--            </div>-->
<!--        </nav>-->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand nav-link dropdown-toggle" style="font-size: 25px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="?page=reader">Moje ksiazki</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" type="button" onclick="logOut()">Wyloguj !</a>
            </div>
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a id="cart-popover" class="btn" data-placement="bottom" title="Order Cart">
                            <span class="total_price">Cart</span>
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="badge">0</span>
                        </a>
                    </li>
                </ul>
            </div>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" id="searchValue" type="text" onkeydown="search()" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" id="searchButton" type="button">Search</button>
                </form>
        </nav>

        <div id="popover_content_wrapper" style="display: none">
            <span id="cart_details"></span>
            <div align="right">
                <a href="#" class="btn btn-primary" id="check_out_cart">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Check out
                </a>
                <a href="#" class="btn btn-default" id="clear_cart">
                    <span class="glyphicon glyphicon-trash"></span> Clear
                </a>
            </div>
        </div>

        <div id="display_item">


        </div>
<!--        <div class="card-deck">-->
<!--            <div class="card" style="width: 18rem;">-->
<!--                <img src="http://home.dev/LibrarySystemv1/LibrarySystem/Textures/wpiwp.jpg" class="card-img-top" alt="...">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Card title</h5>-->
<!--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                </div>-->
<!--                <ul class="list-group list-group-flush">-->
<!--                    <li class="list-group-item">Cras justo odio</li>-->
<!--                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                    <li class="list-group-item">Vestibulum at eros</li>-->
<!--                </ul>-->
<!--                <div class="card-body">-->
<!--                    <a href="#" class="card-link">Card link</a>-->
<!--                    <a href="#" class="card-link">Another link</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="card" style="width: 18rem;">-->
<!--                <img src="http://home.dev/LibrarySystemv1/LibrarySystem/Textures/wpiwp.jpg" class="card-img-top" alt="...">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Card title</h5>-->
<!--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                </div>-->
<!--                <ul class="list-group list-group-flush">-->
<!--                    <li class="list-group-item">Cras justo odio</li>-->
<!--                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                    <li class="list-group-item">Vestibulum at eros</li>-->
<!--                </ul>-->
<!--                <div class="card-body">-->
<!--                    <a href="#" class="card-link">Card link</a>-->
<!--                    <a href="#" class="card-link">Another link</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="card" style="width: 18rem;">-->
<!--                <img src="http://home.dev/LibrarySystemv1/LibrarySystem/Textures/wpiwp.jpg" class="card-img-top" alt="...">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Card title</h5>-->
<!--                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                </div>-->
<!--                <ul class="list-group list-group-flush">-->
<!--                    <li class="list-group-item">Cras justo odio</li>-->
<!--                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                    <li class="list-group-item">Vestibulum at eros</li>-->
<!--                </ul>-->
<!--                <div class="card-body">-->
<!--                    <a href="#" class="card-link">Card link</a>-->
<!--                    <a href="#" class="card-link">Another link</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


<!--        <nav class="navbar navbar-default" role="navigation">-->
<!--            <div class="container-fluid">-->
<!--                <div class="navbar-header">-->
<!--                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">-->
<!--                        <span class="sr-only">Menu</span>-->
<!--                        <span class="glyphicon glyphicon-menu-hamburger"></span>-->
<!--                    </button>-->
<!--                    <a class="navbar-brand" href="/">Webslesson</a>-->
<!--                </div>-->
<!---->
<!--                <div id="navbar-cart" class="navbar-collapse collapse">-->
<!--                    <ul class="nav navbar-nav">-->
<!--                        <li>-->
<!--                            <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">-->
<!--                                <span class="glyphicon glyphicon-shopping-cart"></span>-->
<!--                                <span class="badge"></span>-->
<!--                                <span class="total_price">$ 0.00</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </nav>-->
<!--        <div id="popover_content_wrapper" style="display: none">-->
<!--            <span id="cart_details"></span>-->
<!--            <div align="right">-->
<!--                <a href="#" class="btn btn-primary" id="check_out_cart">-->
<!--                    <span class="glyphicon glyphicon-shopping-cart"></span> Check out-->
<!--                </a>-->
<!--                <a href="#" class="btn btn-default" id="clear_cart">-->
<!--                    <span class="glyphicon glyphicon-trash"></span> Clear-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div id="display_item">-->


        </div>
    </div>
    <?php include(dirname(__DIR__) . '/footer.html') ?>
</div>
</body>
</html>