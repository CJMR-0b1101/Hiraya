var modal_login = document.getElementById('id01');
var modal_register = document.getElementById('id02');
var btn_register = document.getElementById('btn-register');
var btn_login = document.getElementById('btn-login');

btn_register.onclick = function(event) {
	if (event.target == btn_register) {
    	modal_register.style.display = "block";
    	modal_login.style.display = "none";
  	}
}

btn_login.onclick = function(event) {
  if (event.target == btn_login) {
      modal_login.style.display = "block";
    }
}

window.onclick = function(event) {
  if (event.target == modal_register || event.target == modal_login) {
    modal_register.style.display = "none";
    modal_login.style.display = "none";
  }
}