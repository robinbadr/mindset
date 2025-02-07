/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,
} );

document.addEventListener("DOMContentLoaded", function() {

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=accordion', acf_render_accordion );
    }
    
    function acf_render_accordion() {

        const accordionButtons = document.querySelectorAll('.accordion-button');

        accordionButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var accordionItem = button.closest('.accordion-item');
                if (accordionItem) {
                    accordionItem.classList.toggle('active');
                }
            });
        });

    }

}); 