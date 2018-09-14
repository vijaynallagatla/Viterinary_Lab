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
 
// DB table to use
$table = 'order_entry';
 
// Table's primary key
$primaryKey = 'order_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'order_id', 'dt' => 0 ),
    array( 'db' => 'owner_name',  'dt' => 1 ),
    array( 'db' => 'doctor_name',   'dt' => 2 ),
    array( 'db' => 'application_date',     'dt' => 3 ),
    array( 'db' => 'cm_receipt_number',     'dt' => 4 ),
    array( 'db' => 'state',     'dt' => 5 ),
    array( 'db' => 'place',     'dt' => 6 ),
    array( 'db' => 'owner_address',     'dt' => 7 ),
    array( 'db' => 'doctor_address',     'dt' => 8 )
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
 
  $where = "order_state=1";
  
echo json_encode(
     SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "order_state = '0'" )
);

?>