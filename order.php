<?php require_once 'includes/order.code.php'; ?>
<!-- HEAD STARTS HERE -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- HEAD ENDS HERE -->
 <body>
    <!-- NAVIGATION BAR STARTS HERE -->
    <?php require_once 'includes/nav.inc.php'; ?>
    <!-- NAVIGATION BAR ENDS HERE -->

<!-- ORDER STARTS HERE -->
    
    <div class="pg-start container-fluid">
        <h6>Your Life. Your Choice!</h6>
        <p>We have somthing for all, you all</p>
     </div>



     <div class="page-items container-fluid">
        <div class="container" style="display:flex;">
            <div class="row">

                <div class="col">
                    <div class="card" style=" border: 2px solid #ff9922; width: 18rem; margin:auto;">
                        <img src="images/menucard/<?= $src ?>" class="card-img-top" alt="<?= $title ?>" title="<?= $title ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $title ?></h5>
                            <p class="card-text"><?= $description ?></p>
                            <p class="btn" style="background-color: #ff9922;"><?= $price ?> Rs</a>
                        </div>
                    </div>
                </div>

                <div class="col" style=" margin-top:auto; margin-bottom:auto; padding-left:10%;">

                    <?php if(!$orderplaced): ?>
                        <form method="post" action="">
                            <?= $errors ?> <!-- this line will print all the errors, on the top of the form fields -->

                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input  name="contact" type="text" class="form-control" id="contact"  value="<?= $contact ?>" required aria-describedby="contactHelp">
                                <div id="contactHelp" class="form-text">We'll never share your Information with anyone else.</div>
                            </div>

                            <div class="mb-3">
                              <label for="address" class="form-label">Address</label>
                              <input name="address" type="text" class="form-control" id="address" value="<?= $address ?>" required>
                            </div>

                            <button type="submit" name="orderplaced" class="btn btn-lg" style="background-color:rgb(65, 0, 115);">Place Order!</button> 
                        </form>
                    <?php else: ?>
                        <p style="color: #ff9922; display: flex; align-items: center; justify-content: center; font-size: 3vw; font-family: Impact;" >Thank you for your Order!</p>
                    <?php endif; ?>
              </div>
            </div>
        </div>
     </div>
    <!-- ORDER ENDS HERE -->

    <!-- FOOTER STARTS HERE -->
    <?php require_once 'includes/footer.inc.php'; ?>
    <!-- FOOTER ENDS HERE -->