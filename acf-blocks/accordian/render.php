<?php
/**
* Accordion Block.
*
* @param array $block The block settings and attributes.
*
* @package acf-blocks
*/

// Load ACF values and assign defaults.
$background_color = '#ffffff';
if ( get_field( 'accordion_background_color' ) ) {
    $background_color = get_field( 'accordion_background_color' );
}
$text_color = '#000000';
if ( get_field( 'accordion_text_color' ) ) {
    $text_color = get_field( 'accordion_text_color' );
}

// Generate an ID if one hasn't been set.
$block_id = 'accordion-' . wp_rand( 100, 999 );
if ( ! empty( $block['anchor'] ) ) {
    $block_id = esc_attr( $block['anchor'] );
}

// Create an array of classes.
$class_names = 'accordion';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . esc_attr( $block['className'] );
}
?>

<?php if ( have_rows( 'accordion' ) ) : ?>
    <style>
        #<?php echo esc_attr( $block_id ); ?> {
            --accordion-background-color: <?php echo esc_attr( $background_color ); ?>;
            --accordion-text-color: <?php echo esc_attr( $text_color ); ?>;
        }
        #<?php echo esc_attr( $block_id ); ?>.accordion {
            background-color: var(--accordion-background-color);
            color: var(--accordion-text-color);
        }
        #<?php echo esc_attr( $block_id ); ?>.accordion .accordion-title {
            color: var(--accordion-text-color);
        }
        #<?php echo esc_attr( $block_id ); ?>.accordion .accordion-icon svg path {
            fill: var(--accordion-text-color);
        }
    </style>
    <div <?php echo get_block_wrapper_attributes( array( 'class' => $class_names, 'id' => $block_id ) ); ?>>
        <?php
        while ( have_rows( 'accordion' ) ) :
            the_row();
            ?>
            <div class="accordion-item">
                <h3>
                    <button class="accordion-button">
                        <?php if ( get_sub_field( 'accordion_title' ) ) : ?>
                            <span class="accordion-title"><?php the_sub_field( 'accordion_title' ); ?></span>
                        <?php endif; ?>
                        <span class="accordion-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title><?php esc_html_e( 'Plus' ); ?></title><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg></span>
                    </button>
                </h3>
                <?php if ( get_sub_field( 'accordion_title' ) ) : ?>
                    <div class="accordion-text"><?php the_sub_field( 'accordion_text' ); ?></div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>