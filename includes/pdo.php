<?php
    //Database Connection Code
    $dsn='mysql: host=localhost; dbname=sizzledrizzle; charset=utf8mb4';
    $user = 'sdadmin';
    $password = 'Test@123';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // This instructs PDO to treat all errors seriously enough to halt the code and report.
        PDO::ATTR_EMULATE_PREPARES => false, // Instruct PDO not to emulate Statements, y better to let the DBMS do its own prepared statements
        ];
    try
    {
        $pdo = new PDO($dsn, $user, $password, $options);
    }
    catch(PDOException $e)
    {
        die('Problem connecting to the Database');
    }
    
    return $pdo;