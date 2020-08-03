<?php

$dbname = "test";

$dsn = "mysql:host=db;dbname={$dbname};";
$dbuser = "root";
$dbpassword = "secret";

$file_path = "customer.csv";
$export_csv_title = ["ユーザーID", "名前", "メール"];
$export_sql = "SELECT * FROM user";

try {
    $dbh = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $e) {
    print('Connection failed:'.$e->getMessage());
    die();
}

// encoding title into SJIS-win
foreach( $export_csv_title as $key => $val ){
    $export_header[] = mb_convert_encoding($val, 'SJIS-win', 'UTF-8');
}
/*
    Make CSV content
 */
if(touch($file_path)){
    $file = new SplFileObject($file_path, "w");

    // write csv header
    $file->fputcsv($export_header);

    // query database
    $stmt = $dbh->query($export_sql);

    // create csv sentences
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $file->fputcsv($row);
    }

    // close database connection
    $dbh = null;
}