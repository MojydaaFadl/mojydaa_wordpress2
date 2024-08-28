( function( api ) {

	// Extends our custom "flower-shop-elementor" section.
	api.sectionConstructor['flower-shop-elementor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );