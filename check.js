var form = document.querySelector('form');

if (!isSafariBrowser()){
	form.addEventListener('submit', function (event) {
   		event.preventDefault();
		var data = new FormData(form);
		check(data);
	});
} else {
	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var x = document.getElementById("username").value;
		console.info("Username: " + x);
		console.info("Running, checks...");
		checkSafari(x);
	});
}

// Default
function check(data){
   var request = new XMLHttpRequest();
   var results = data.get('username');
   var query_request = "usernamecheck.php?username=" + results;
   request.open("GET", query_request);
   request.addEventListener('load', function(event) {
	var d = new Date();
	if (request.status >= 200 && request.status < 300) {
        	console.log(request.responseText);
        	console.log("Return Code: " + request.status);
		messageStatus("Sent, " + d);
      	} else {
        	console.warn(request.statusText, request.responseText);
		messageStatus("Error Occurred");
      	}
   });
   request.send(data);
}

// Only for Safari - Apple
function checkSafari(input_data){
	var request = new XMLHttpRequest();
	var results = input_data;
	var query_request = "usernamecheck.php?username=" + results;
	request.open("GET", query_request, true);
   	request.addEventListener('load', function(event) {
	var d = new Date();
	if (request.status >= 200 && request.status < 300) {
        	console.log(request.responseText);
        	console.log("Return Code: " + request.status);
		messageStatus("Sent, " + d);
      	} else {
        	console.warn(request.statusText, request.responseText);
		messageStatus("Error Occurred");
      	}
   });
   request.send();
}

function isSafariBrowser(){
	var VendorName = window.navigator.vendor;
	return ((VendorName.indexOf('Apple') > -1) && (window.navigator.userAgent.indexOf('Safari') > -1));
	}

function messageStatus(status_in){
	document.getElementById("msg_status").innerHTML = status_in;
}
