$(document).ready(function(){
 $('.header').height($(window).height());
 
})

function closehead() {
	var header = document.getElementById('covs');
	var boddr = document.getElementById('bods');
	header.style.display = "none";
	boddr.style.display = "block";
}