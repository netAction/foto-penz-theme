<?php

// check if the flexible content field has rows of data
if( have_rows('flexible-content') ):

	// loop through the rows of data
	while ( have_rows('flexible-content') ) : the_row();

		if( get_row_layout() == 'blogexcerpt' ):
			get_template_part('templates/widget-blogexcerpt');

		elseif( get_row_layout() == 'richtext' ): 
			get_template_part('templates/widget-richtext');

		elseif( get_row_layout() == 'jumbobox' ): 
			get_template_part('templates/widget-jumbobox');

		elseif( get_row_layout() == 'rawhtml' ): 
			get_template_part('templates/widget-rawhtml');

		elseif( get_row_layout() == 'form' ): 
			get_template_part('templates/widget-form');

		elseif( get_row_layout() == 'button' ): 
			get_template_part('templates/widget-button');

		elseif( get_row_layout() == 'backbutton' ): 
			get_template_part('templates/widget-backbutton');

		elseif( get_row_layout() == 'navigation' ): 
			get_template_part('templates/widget-navigation');

		elseif( get_row_layout() == 'grid-navigation' ): 
			get_template_part('templates/widget-grid-navigation');

		elseif( get_row_layout() == 'columns' ): 
			get_template_part('templates/widget-columns');

		elseif( get_row_layout() == 'grid-gallery' ): 
			get_template_part('templates/widget-grid-gallery');

		elseif( get_row_layout() == 'slider-gallery' ): 
			get_template_part('templates/widget-slider-gallery');

		endif;

	endwhile;

else :

	// no layouts found

endif;

?>