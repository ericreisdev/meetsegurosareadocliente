(function($) {
  "use strict"; // Start of use strict

	$(window).on('load', function() {
		let elem = 'input[type=radio][name=seguroRadio]';
		let url = window.location.href;
		let seguro_type = ''
		if (url.indexOf('?') !== -1)
		seguro_type = url.split('?')[1].split('=')[1];

		$(elem).each(function(i) {
		if ($(this).prop('value') === seguro_type)
			$(this).prop('checked', true);
			$(this).change()
		});
	});
})(jQuery); // End of use strict
