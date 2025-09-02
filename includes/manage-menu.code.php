<?php
        $root = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
    require_once "$root/includes/pdo.php";
    require_once "$root/includes/default-library.php";
    require_once "$root/includes/library.php";
    // Configuration
    $CONFIG['images']['directory'] = 'images';
        // (width x height)
    $CONFIG['images']['display-size'] = '480 x 360';
    $CONFIG['images']['card-size'] = '331 x 474';
    $CONFIG['images']['menu-card-size'] = '474 x 474';

    // Functions
    function addImageData(string $name,string $title, String $description, int $price)
    {
        global $pdo;
            $name = strtolower($name);
            $name = str_replace(' ', '-',$name); // (oldpart, newpart, string)

            // Add to the Database
            $description = nl2pilcrow($description);
            $sql = 'INSERT INTO images(title, description, name, src, price, featured)
                    VALUES(?, ?, ?, ?, ?, true)';
            $pdoStatement = $pdo -> prepare($sql);
            $data = [$title, $description, $name, $name, $price];
            $pdoStatement -> execute($data);

            $id = $pdo->lastInsertId();
            $src = sprintf('%06s-%s', $id, $name);

            $sql = 'UPDATE images set src=? WHERE id=?';
            $pdoStatement = $pdo -> prepare($sql);
            $data = [$src , $id];
            $pdoStatement -> execute($data);
        return [$id, $src];
    }
    function addImageFile(string $file, string $src)
    {
        global $root, $CONFIG;
        // Keep Original
        move_uploaded_file($file,"$root/{$CONFIG['images']['directory']}/originals/$src"); // move_uploaded_file(source, destination)
        // Resize Copies
            // Display 
        resizeImage("$root/{$CONFIG['images']['directory']}/originals/$src", "$root/{$CONFIG['images']['directory']}/display/$src", $CONFIG['images']['display-size'] );
            // Card 
        resizeImage("$root/{$CONFIG['images']['directory']}/originals/$src", "$root/{$CONFIG['images']['directory']}/cards/$src", $CONFIG['images']['card-size'] );
            // Menu Card 
        resizeImage("$root/{$CONFIG['images']['directory']}/originals/$src", "$root/{$CONFIG['images']['directory']}/menucard/$src", $CONFIG['images']['menu-card-size'] );
    }

    // Initialise
    $id = 0;
    $title = $description = '';
    $price = 0;
    $disabled = '';
    $errors = '';

    // Item Inserted
    if(isset($_POST['insert'])) 
    {
        // Read Data
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $price = $_POST['price'];

        // Check Data
        $errors = [];

        if(!$title) $errors[] = 'Missing Title!';
        if(!$description) $errors[] = 'Missing Description!';
        if (!$price) {
            $errors[] = "Missing Price!";
        } 
        // Check if the price is numeric
        elseif (!is_numeric($price)) {
            $errors[] = "Price must be a valid number.";
        } 
        // Check if the price is positive
        elseif ($price <= 0) {
            $errors[] = "Invalid Price!";
        }

        // Check File
        $filetypes = ['image/gif', 'image/jpeg', 'image/png', 'image/webp'];
        if(!isset($_FILES['image'])) $errors[] = 'Missing File';
        else switch($_FILES['image']['error'])
        {
            case UPLOAD_ERR_OK:
                // No Error with actual file, need to check the file for suitability!
                if(!in_array($_FILES['image']['type'], $filetypes))
                    $errors[] = 'Not a suitable Image File';
                if(!is_uploaded_file($_FILES['image']['tmp_name']))
                    $errors[] = 'Not an uploaded file';
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $errors[] = 'File too Big!';
                break;
            case UPLOAD_ERR_NO_FILE:
                $errors[] = 'Problem with File Upload!';
                break;
            default:
        }

        // Check Errors
        if(!$errors) // Proceed
        {
            // Get Name
            $name = $_FILES['image']['name'];
            [$id, $src] = addImageData($name, $title, $description, $price);
            addImageFile($_FILES['image']['tmp_name'], $src);
            // Finish Up
            $errors = '';
            $title = $description = '';
            $price = 0;

        }
        else // Report Errors
        {
            $errors = implode('<br>', $errors);
            $errors = sprintf('<p>%s</p>', $errors);
        }
    }