$(document).on('click', '.update_profile', function () {
	var nameError = validText('dispName','dispNameError');
	var DOBError = validText('dispDob','DispDoberror');
	
	if(nameError==1 || DOBError) {
		event.preventDefault();
		return false;
	}
	
	return true;
})

function validText(textBoxName, ErrorName) {
	var error=0;
	let textBoxVal = $("."+textBoxName).val();
	console.log('val=='+textBoxVal);
	if (textBoxVal.trim() == "") {
		$("#"+ErrorName).html("Required");
		error = 1;
	}
	return error;
}