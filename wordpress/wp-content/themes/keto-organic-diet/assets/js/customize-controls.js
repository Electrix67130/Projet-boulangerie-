( function( api ) {

	// Extends our custom "keto-organic-diet" section.
	api.sectionConstructor['keto-organic-diet'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
