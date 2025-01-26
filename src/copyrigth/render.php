

<?php 
if ( ! empty( $attributes['startingYear'] ) && ! empty( $attributes['showStartingYear'] ) ) {
    $display_date = $attributes['startingYear'] . '–' . $current_year;
} else {
    $display_date = $current_year;
}

?>