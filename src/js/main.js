jQuery(document).ready(function($) {
	// Every time a modal is shown, if it has an autofocus element, focus on it.
	$('.modal').on('shown.bs.modal', function() {
		$(this).find('[autofocus]').focus();
	});

	/* Add twitter url */
	$( '.footer-social__twitter a' ).prop( 'href', 'https://twitter.com/Sigizmund_RF' );

	( function( $ ){
		/* Margin to portfolio recent projects description */
		var projectsArr = $( '.recent-projects__data-title' );
		$.each( projectsArr, function(){
			var halfWidth = $( this ).width() / 2;
			var halfHeight = $( this ).height() / 2;
			$( this ).css( {
				'margin-top': '-' + halfHeight + 'px',
				'margin-left': '-' + halfWidth + 'px'
			} );
		} );
	} )( $ );

	/* Sticky footer */
	( function( $ ){
		var footerHeight = $( '.footer-general' ).height();
		$( 'body' ).css( 'margin-bottom', footerHeight + 'px' );

	} )( $ );

});