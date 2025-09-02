<?php require_once 'includes/manage-menu.code.php'; ?>
<!-- HEAD STARTS HERE -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- HEAD ENDS HERE -->

<body>

    <!-- NAVIGATION BAR STARTS HERE -->
    <?php require_once 'includes/nav.inc.php'; ?>
    <!-- NAVIGATION BAR ENDS HERE -->

    <div class="pg-start container-fluid">
        <h6>ADD MENU</h6>
        <p>New Drizzles Loading!</p>
    </div>

        <div class="page-items container-fluid" id="edit-image">
            <div class="container">
              <form method="post" action="" enctype="multipart/form-data" id="editimage-form">
				        <input type="hidden" name="id"  value="<?= $id ?>">
				        <?= $errors ?>

				        <fieldset <?= $disabled ?>>
                  <p id="image" class="preview-image mb-3">
					  	      <label class="form-label" for="image">Image</label>
					  		      <input name="image" class="form-control" type="file" data-preview="preview">
					  	        <img id="preview">
					        </p>

					        <p class="mb-3">
                    <label class="form-label" for="title" >Title</label>
					  	        <input type="text" name="title" class="form-control" value="<?= $title ?>">
                  </p>

					        <p class="mb-3">
                    <label for="description" >Description</label>
					  	        <textarea name="description" class="form-control"><?= $description ?></textarea>
                  </p>

                  <p class="mb-3">
                    <label class="form-label" for="price" >Price</label>
					  	<input type="number" name="price" class="form-control" value="<?= $price ?>">
                  </p>
				  </fieldset>
				  <button type="submit" name="insert" class="btn btn-lg" style="background-color: #ff9922;">Add Menu Item</button>
        </form>
            </div>
        </div>
</body>

    <!-- FOOTER STARTS HERE -->
    <?php require_once 'includes/footer.inc.php'; ?>
    <!-- FOOTER ENDS HERE -->