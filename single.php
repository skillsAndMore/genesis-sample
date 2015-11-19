<?php
/**
 * Questo file aggiunge il layout per le pagine singole al Genesis Sample Theme.
 *
 * @author Codeat
 * @package Sample Theme
 */


 //* Rimuovo le informazioni legate all'articolo
 remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

genesis();
