var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

function CurrentMonth() {
	var d = new Date();
	return MonthToString(d.getMonth());
};

function MonthToString(dateInt) {
	return month[dateInt];
};


function unimplemented() {
	alert('Functionality is not implemented yet');
}

function makeTextbox(placeholder, reference) {
	var input = $('<input read="' + reference + '" class="form-control" type="textbox" placeholder="' + placeholder + '" />');
	return input;
}