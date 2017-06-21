$(function() {

	// intercept delete form submissions with confirmation
	$(".form-delete input[type='submit']").on('click', function() {
		return confirm("Are you sure? This cannot be undone.");
	});
});