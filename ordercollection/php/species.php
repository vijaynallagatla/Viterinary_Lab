<?php
 
/*
 * Example PHP implementation used for the index.html example
 */
 
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
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'species' )
    ->fields(
        Field::inst( 'id' ),
        Field::inst( 'species_name' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'species_desc' )
    )
    ->process( $_POST )
    ->json();