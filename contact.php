<?php require_once 'includes\contact.code.php'; ?>

<!-- HEAD STARTS HERE -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- HEAD ENDS HERE -->
 <body>
    <!-- NAVIGATION BAR STARTS HERE -->
    <?php require_once 'includes/nav.inc.php'; ?>
    <!-- NAVIGATION BAR ENDS HERE -->

    <!-- CONTACT STARTS HERE -->
    
    <div class="pg-start container-fluid">
        <h6>HIT US UP!</h6>
        <p>If you all got any feedback or questions, just hit us up!</p>
     </div>

     <div class="page-items container-fluid">
        <div class="container">

        <?php if(!$sent): ?>
            <form method="post" action="">
             <?= $errors ?> <!-- this line will print all the errors, on the top of the form fields -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" value="<?= $name ?>" class="form-control" id="name" required>
              </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input  name="email" type="email" class="form-control" id="email"  value="<?= $email ?>" required aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                  <label for="subject" class="form-label">Subject</label>
                  <input name="subject" type="text" class="form-control" id="subject" value="<?= $subject ?>" required>
                </div>

                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                   <textarea name="message" class="form-control" id="message" required ><?= $message ?></textarea>  <!-- id="comments" in book -->
                </div>
                <button type="submit" name="send" class="btn btn-lg" style="background-color: #ff9922;">Submit</button> 
              </form>
          <?php else: ?>
            <p style="color: #ff9922; display: flex; align-items: center; justify-content: center; font-size: 3vw; font-family: Impact;" >Thank you for your message!</p>
            <p>Now, <a href="/" style="text-decoration:none; color:white; font-weight:400;">go away ...</a>.</p>
          <?php endif; ?>
        </div>
     </div>
    <!-- CONTACT ENDS HERE -->

    <!-- FOOTER STARTS HERE -->
    <?php require_once 'includes/footer.inc.php'; ?>
    <!-- FOOTER ENDS HERE -->