<?php
    $root = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
    $pdo = require_once "$root/includes/pdo.php";
    require_once "$root/includes/default-library.php";
    require_once "$root/includes/library.php";

    // Configuration 
    $CONFIG['menu']['row-size'] = 4; // page size

    $menurow = 1; // page
    $limit = $CONFIG['menu']['row-size'];
    $offset = 0;

    $menuitem =     '<div class="col">
                        <div class="card text-bg-dark" style="width: 288px; height: 320px;">
                            <img src="images/originals/%s" class="card-img" style="opacity: 0.7;" alt="%s" title="%s">
                            <div class="card-img-overlay">
                                <h5 class="card-title">%s</h5>
                                <p class="card-text">%s</p>
                            </div>
                        </div>
                    </div>';


        $sql = "SELECT id, title, src, description
            FROM images
            WHERE featured=true
            ORDER BY id LIMIT $limit OFFSET $offset";

        $results = $pdo -> query($sql);

        $items = [];
        foreach($results as $row) // fetch one row at a time
        {
            $items[] = sprintf($menuitem, $row['src'], $row['title'], $row['title'], $row['title'], $row['description']);
        }


    $items = implode($items);

    
    
    