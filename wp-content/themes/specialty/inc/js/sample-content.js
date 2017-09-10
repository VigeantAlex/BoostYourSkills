jQuery( document ).ready( function( $ ) {
	$( '.specialty-sample-content-notice' ).on( 'click', '.notice-dismiss', function( e ) {
		$.ajax( {
			type: 'post',
			url: ajaxurl,
			data: {
				action: 'specialty_dismiss_sample_content',
				nonce: specialty_SampleContent.dismiss_nonce,
				dismissed: true
			},
			dataType: 'text',
			success: function( response ) {
				//console.log( response );
			}
		} );
	});
} );
