<?php
 
// DataTables PHP library
include( "DataTables.php" );
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;
 
 
/*
 * Example PHP implementation used for the join.html example
 */
Editor::inst( $db, 'users' )
    ->field(
        Field::inst( 'username' )
    )
    //->leftJoin( 'sites', 'sites.id', '=', 'users.site' )
    ->process($_POST)
    ->json();