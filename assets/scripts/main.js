(function($) {

$( '.grid-gallery a:not(.grid-gallery-navlink)' ).swipebox();

$( '.widget-flexgrid-gallery a' ).swipebox();


})(jQuery);



(function($) {
	// Slider gallery
	if (!$('.widget-slider-gallery .widget-slider-gallery-gallery').length) return;

	// Load the classic theme
	Galleria.loadTheme('/wp-content/themes/foto-penz-theme/assets/scripts/galleria/classic/galleria.classic.min.js');
	// Initialize Galleria
	Galleria.run('.widget-slider-gallery .widget-slider-gallery-gallery');

})(jQuery);


(function($) {
	// Align images in flexgrid gallery on every resize event

	$('.widget-flexgrid-gallery').each(function() {
		var imagegap = 14.01; // Pixel between the images
		var xsrows = [];
		var largerows = [];
		var thisxsrow = [];
		var thislargerow = [];
		var galleryelement = $(this);

		galleryelement.find('a').each(function() {
			thisxsrow.push(this);
			thislargerow.push(this);
			switch ($(this).data('clear')) {
				case 'never': break;
				case 'xs': xsrows.push( thisxsrow ); thisxsrow = []; break;
				case 'always': xsrows.push( thisxsrow ); thisxsrow = []; largerows.push( thislargerow ); thislargerow = []; break;
			}
		});

		// Rest der Galerie als eine Zeile nehmen
		if (thisxsrow.length) {
			xsrows.push( thisxsrow ); thisxsrow = [];
		}
		if (thislargerow.length) {
			largerows.push( thislargerow ); thislargerow = [];
		}


		function alignimages() {
			// Bilder ausrichten
			if (galleryelement.find('.widget-flexgrid-gallery-xsdetect').is(":visible")) {
				var currentorder = xsrows;
			} else {
				var currentorder = largerows;
			}

			$.each(currentorder, function(i, row) {
				// iterate rows

				// determine the factor for each image
				var aspectsum = 0;
				$.each(row, function(i) {
					aspectsum += $(row[i]).data('aspect');
				});

				// remaining space for images
				var rowwidth = galleryelement.width() - ((row.length) * imagegap);

				$.each(row, function(i) {
					imgelement = $(row[i]).find('img');
					imgelement.css('width', rowwidth * $(row[i]).data('aspect') / aspectsum );
				});
			});

		}
		$(window).on('resize', function() {
			alignimages();
		});
		alignimages();

	});
})(jQuery);
