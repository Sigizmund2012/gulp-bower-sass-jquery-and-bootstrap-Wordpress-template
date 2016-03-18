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
		if( projectsArr.length ){
			$.each( projectsArr, function(){
				var halfWidth = $( this ).width() / 2;
				var halfHeight = $( this ).height() / 2;
				$( this ).css( {
					'margin-top': '-' + halfHeight + 'px',
					'margin-left': '-' + halfWidth + 'px'
				} );
			} );
		}

	} )( $ );

	/* Sticky footer */
	( function( $ ){
		var footerHeight = $( '.footer-general' ).height();
		$( 'body' ).css( 'margin-bottom', footerHeight + 'px' );

	} )( $ );

	/* Counting my age */
	(function ( $ ) {

		var plural = function (b) {
			return function (a) {
				return b[1 === a % 10 && 11 !== a % 100 ? 0 : 2 <= a % 10 && 4 >= a % 10 && (10 > a % 100 || 20 <= a % 100) ? 1 : 2];
			};
		};
		var currentDate = new Date();
		var fullYear = new Date().getFullYear() - 1981;
		var countMonth = 11 - ( 10 - currentDate.getMonth() );
		currentDate.setFullYear( fullYear , countMonth );
		var year = currentDate.getFullYear();
		var month = currentDate.getMonth();
		var day = currentDate.getDate();
		var pluralYears = plural( [ 'год', 'года', 'лет' ] )( year );
		var pluralMonths = plural( [ 'месяц', 'месяца', 'месяцев' ] )( month );
		var pluralDays = plural(['день','дня','дней'])( day );

		$( '#smart-age-year' ).html( year );
		$( '#smart-age-year__plural' ).html( pluralYears );
		$( '#smart-age-month' ).html( month );
		$( '#smart-age-month__plural' ).html( pluralMonths );
		$( '#smart-age-day' ).html( day );
		$( '#smart-age-day__plural' ).html( pluralDays );

	})( $ );

	/* Animation page */
	( function( $ ){

		if( $( '#animate-page-detector' ).length ){
			var categoryHeading = $( '.single-services-category-heading' ).hide();
			var heading = $( '.single-services__heading' ).hide();
			var topMenu = $( '#topmenu' ).hide();
			var search = $( '.search' );
			var logo = $( '.logo' );
			setTimeout( function animateHeadersAndTopMenu(){
				categoryHeading.show().addClass( 'animated fadeInLeftBig' );
				heading.show().addClass( 'animated fadeInRightBig' );
				topMenu.show().addClass( 'animated zoomInDown' );
			} , 1000);
			setInterval( function animateSearch(){
				if ( ! search.hasClass( 'animated flip' ) && ! logo.hasClass( 'animated swing' ) ) {
					search.addClass( 'animated flip' );
					logo.addClass( 'animated swing' );
				}
				else {
					search.removeClass( 'animated flip' );
					logo.removeClass( 'animated swing' );
				}
			} , 2500 );
		}

	} )( $ );

});