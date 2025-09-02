<?php require_once 'includes/menu.code.php'; ?>
<!-- HEAD STARTS HERE -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- HEAD ENDS HERE -->
 <body>
    <!-- NAVIGATION BAR STARTS HERE -->
    <?php require_once 'includes/nav.inc.php'; ?>
    <!-- NAVIGATION BAR ENDS HERE -->

    <!-- MENU STARTS HERE -->
     <div class="pg-start container-fluid">
        <h6>Your Life. Your Choice!</h6>
        <p>We have somthing for all, you all</p>
     </div>
      <div class="menu-title container-fluid">
        <h2><i id="menu-logo" class="ri-restaurant-fill logostyle"></i> MENU</h2>
      </div>
      <!-- MENU-ITEMS STARTS FROM HERE -->
      <div class="menu-items container-fluid">
        <div class="container">

          <div class="row menu-row"> 
            <?= $items ?>
          </div>

        </div>
      </div>
      <!-- MENU-ITEMS ENDS HERE -->
      <div class="order container-fluid" style="border-top: 2px solid #ff9922;">
        <p><span>SURE TO KEEP YA'LL</span><br> COMMING BACK FOR MORE</p>
      </div>
    <!-- MENU ENDS HERE -->

    <!-- FOOTER STARTS HERE -->
    <?php require_once 'includes/footer.inc.php'; ?>
    <!-- FOOTER ENDS HERE -->