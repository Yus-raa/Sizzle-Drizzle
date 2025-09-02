<?php
    $root = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);
    $pdo = require_once "$root/includes/pdo.php";
    require_once "$root/includes/default-library.php";
    require_once "$root/includes/library.php";

    // Initialization
    $items = ''; 

    // Configuration 
    $CONFIG['menu']['row-size'] = 3; // page size
    
    $limit = $CONFIG['menu']['row-size'];
    $totalItems = $pdo -> query('SELECT count(*) FROM images WHERE featured = true') -> fetchColumn();
    $totalRows = ceil($totalItems / $limit);

    $menuitem =     '<div class="col menu-col">
                        <div class="card" style="width: 18rem; border: 2px solid #ff9922;">
                            <img src="images/menucard/%s" class="card-img-top" alt="%s" title="%s">
                            <div class="card-body">
                              <h5 class="card-title">%s</h5>
                              <p class="card-text">%s</p>
                              <a href="order.php?id=%s" class="btn" style="background-color: #ff9922; color: white;">Place Order!</a>
                            </div>
                        </div>
                    </div>';
    $items = [];

    for($i = 1; $i <= $totalRows; $i++)
    {
        $offset = ($i - 1) * $limit;
        $sql = "SELECT id, title, src, description
                FROM images
                WHERE featured=true
                ORDER BY id DESC LIMIT $limit OFFSET $offset";

        $results = $pdo -> query($sql);
        foreach($results as $row) // fetch one row at a time
        {
            $items[] = sprintf($menuitem, $row['src'], $row['title'], $row['title'], $row['title'], $row['description'], $row['id']);
        }

    }
    $items = implode($items);

    
    
    