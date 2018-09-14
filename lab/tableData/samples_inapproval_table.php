<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning. */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 

 session_start();
 $lab=$_SESSION['role'];
// DB table to use
$table = <<<EOT
 (
    SELECT 
      a.*,b.lab,b.sample_id as id
    FROM sample_entry a,labs b where b.lab='{$lab}' AND a.sample_id = b.sample_id AND b.result_status='1'
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'sample_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'sample_id', 'dt' => 0 ),
    array( 'db' => 'order_id',  'dt' => 1 ),
    array( 'db' => 'barcode',   'dt' => 2 ),
    array( 'db' => 'species',     'dt' => 3 ),
    array( 'db' => 'sample_type',     'dt' => 4 ),
    array( 'db' => 'animal_age',     'dt' => 5 ),
    array( 'db' => 'sex',     'dt' => 6 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'iahvb',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

?>