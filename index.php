<?php require_once 'includes/displaymenu.code.php'; ?>
<!-- HEAD STARTS HERE -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- HEAD ENDS HERE -->
<body>
    <!-- NAVIGATION BAR STARTS HERE -->
    <?php require_once 'includes/nav.inc.php'; ?>
    <!-- NAVIGATION BAR ENDS HERE -->

    <!-- INTRO STARTS HERE -->
     <div id="intro" class="container-fluid">
        <p id="brand">Sizzle&Drizzle</p>
        <img
            class="img-fluid"
            id="burger-front"
            src="images\Burger-front2.png"
            alt="Burger"
        />
    </div>
    <!-- INTRO ENDS HERE -->

    <!-- CATEGORIES STARTS HERE -->
    <div class="container-fluid category">
        <p class="bite">HAVE A BITE OF OUR BEST!</p>
    </div>

        <div class="container-fluid cat-items">
            <div class="row flex-row flex-nowrap overflow-auto">

                <?= $items?>
                
            </div>
        </div>

        <div class="order container-fluid">
          <p><span>SURE TO KEEP YA'LL</span><br> COMMING BACK FOR MORE</p>
          <a href="menu.php" class="btn btn-lg" style="background-color: #ff9922;">ORDER NOW!</a>
        </div>

    <!-- CATEGORIES ENDS HERE -->

    <!-- FOOTER STARTS HERE -->
    <?php require_once 'includes/footer.inc.php'; ?>
    <!-- FOOTER ENDS HERE -->