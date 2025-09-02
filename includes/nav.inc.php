<!-- Create an empty array of list items -->
<!-- Iterate through the links array -->
<!-- Copy the array keys and values into strings for the list items -->
<!-- Print the item string in the page -->
<?php

$current = basename($_SERVER['SCRIPT_FILENAME']); // extract only the file name

 $links = [
 'Home' => 'index.php',
 'Menu' => 'menu.php',
 'Contact' => 'contact.php',
 'About us' => 'about.php',
 ];

//  Template strings : sprintf($template, value, value, ...)
    $a = '<li class="nav-item"><a class="nav-link active"  style="font-weight:600;" href="/%s">%s</a></li>';
    $span = '<li class="nav-item"><span class="nav-link disabled" aria-disabled="true" style="font-weight:600;">%s</span></li>';

 $ul = [];

    //($array as $key => $value)
    foreach($links as $text => $href){ 
        $ul[] = $href == $current ? sprintf($span, $text) : sprintf($a,$href,$text);
    }
    $ul = implode($ul); // you’ll have to join the array items into a single string, code script.
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><i class="ri-restaurant-fill logostyle"></i> SIZZLE&DRIZZLE</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-1">
                <?= $ul ?>
            </ul>
          </div>
        </div>
      </nav>