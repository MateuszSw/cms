<?php



try

{

    $dbh = new PDO("mysql:dbname=cms;host=localhost", "root", "losum22" );

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

catch(PDOException $err)

{

    echo '<pre>';

    print_r($err->getMessage());

    print_r($err->getLine());

    die;

}

