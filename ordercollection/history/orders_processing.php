<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'order_entry';
 
// Table's primary key
$primaryKey = 'order_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'order_id', 'dt' => 1 ),
    array( 'db' => 'application_date',  'dt' => 2 ),
    array( 'db' => 'cm_receipt_number',   'dt' => 3 ),
    array( 'db' => 'reference_number',     'dt' => 4 ),
    array( 'db' => 'sample_received_date',     'dt' => 5 ),
    array( 'db' => 'owner_name',     'dt' => 6 ),
    array( 'db' => 'owner_number',     'dt' => 7 ),
    array( 'db' => 'owner_email_id',     'dt' => 8 ),
    array( 'db' => 'owner_address',     'dt' => 9 ),
    array( 'db' => 'doctor_name',     'dt' => 10 ),
    array( 'db' => 'doctor_number',     'dt' => 11 ),
    array( 'db' => 'doctor_email_id',     'dt' => 12 ),
    array( 'db' => 'doctor_address',     'dt' => 13 ),
    array( 'db' => 'state',     'dt' => 14 ),
    array( 'db' => 'place',     'dt' => 15 )
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