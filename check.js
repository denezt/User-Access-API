var form = document.querySelector('form');

form.addEventListener('submit', function (event) {
   event.preventDefault();
   var data = new FormData(form);
   check(data);
});

function check (data){
   var request = new XMLHttpRequest();
   var results = data.get('username');
   var query_request = "usernamecheck.php?username=" + results;
   request.open("POST", query_request);
   request.addEventListener('load', function(event) {
      if (request.status >= 200 && request.status < 300) {
         console.log(request.responseText);
         console.log("Return Code: " + request.status);
      } else {
         console.warn(request.statusText, request.responseText);
      }
   });
   console.log(results);
   request.send(data);
}
