// var lollol = document.getElementById('logsout');

// function lgout(e) {
// 	console.log(document.cookie);
// }

// lollol .addEventListener('click',lgout,false);

// $('#logsout').click(function() {
// 	$.ajax({
// 		type: "POST";
// 		url: "logout.php";
// 		data: {}
// 	}).done(function(msg){
// 		alert('You have logged out!',msg);
// 	});
// });

$('#logsout').click(function() {
  $.ajax({
    type: "GET",
    url: "./logout.php",
    data: { name: "John" }
  }).done(function( msg ) {
    alert( "You have logged out!" );
  });
});