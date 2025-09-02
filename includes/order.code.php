<?php
$root = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
$pdo = require_once "$root/includes/pdo.php";
  // Initialise
    $contact = $address = $title = '';
    $errors = '';
    $orderplaced = false;
    if (isset($_GET['id']) && is_numeric($_GET['id'])) 
    {
        $id = intval($_GET['id']);
    } else {
        die('Item not Found!');
    }
    // Function
    function addOrderData(string $title,string $contact, String $address)
    {
        global $pdo;

            // Add to the Database
            $sql = 'INSERT INTO orders(item, contact, address)
                    VALUES(?, ?, ?)';
            $pdoStatement = $pdo -> prepare($sql);
            $data = [$title, $contact, $address];
            $pdoStatement -> execute($data);
    }

    // Retrieving item
    $sql = "SELECT title, src, description, price FROM images WHERE id = $id LIMIT 1";
    $menuitem = $pdo -> query($sql) -> fetch();
    if(!$menuitem)
    {
        echo "Item not found!.";
    }
    else
    {
        $title = $menuitem['title'];
        $src = $menuitem['src'];
        $description = $menuitem['description'];
        $price = $menuitem['price'];
    }

  // Process Submitted Form
    if(isset($_POST['orderplaced'])) 
    {
    // Read Data
      $contact = trim($_POST['contact']);
      $address = trim($_POST['address']);
      
    // Check Data
      $errors = [];

      if(!$contact) $errors[] = 'Contact Number Missing!';
      elseif(!preg_match('/^\+?[0-9]{10,15}$/', $contact)) $errors[] = 'Invalid Contact Number!';

      if(!$address) $errors[] = 'Missing Address!';

      
      if(!$errors) { // If no errors

        addOrderData($title, $contact, $address);
        $orderplaced = true;
      }
      else { // Else, Report Errors
        $errors = implode('<br>', $errors);
        $errors = sprintf('<p>%s</p>', $errors);
      }   
   }

