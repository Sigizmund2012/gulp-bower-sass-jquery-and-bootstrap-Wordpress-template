jQuery(document).ready(function($) {
	// Every time a modal is shown, if it has an autofocus element, focus on it.
	$('.modal').on('shown.bs.modal', function() {
		$(this).find('[autofocus]').focus();
	});

	/* Add twitter url */
	$( '.footer-social__twitter a' ).prop( 'href', 'https://twitter.com/Sigizmund_RF' );

	/* Sticky footer */
	( function( $ ){
		var footerHeight = $( '.footer-general' ).height();
		$( 'body' ).css( 'margin-bottom', footerHeight + 'px' );

	} )( $ );

});