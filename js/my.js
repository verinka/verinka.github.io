var shadow = document.getElementById('shadow');
function openmodal(arg) {
	shadow.style.display = "block";
	document.getElementById(arg).style.display = 'block';
	setTimeout(function () {
		shadow.style.opacity = 1;
	}, 0);
	document.body.style.overflowY = "hidden";
}

shadow.onclick = function () {
	if (event.target == shadow) {
		shadow.style.opacity = 0;
		setTimeout(function () {
			shadow.style.display = "none";
			var elements = document.getElementById('window').querySelectorAll('.window-block');
			for (var i = 0; i < elements.length; i++) {
				elements[i].style.display = 'none';
			}
		}, 300); document.body.style.overflowY = "auto";
	}
}

//Old jax
// $(function(){
//     'use strict';
// $('#realform').on('submit', function(e){
//     e.preventDefault();
//     var fd = new FormData( this );
//     $.ajax({
//       url: 'libs/phpmailer/send.php',
//       type: 'POST',
//       contentType: false, 
//       processData: false, 
//       data: fd,
//       success: function(msg){
// if(msg == 'ok') {
//   $("#realform").val("Отправлено"); 
// } else {
//         $(".warning").val("Ошибка");
//         setTimeout(function() {$(".button").val("Отправить");}, 3000);
// }
//       }
//     });
//   });
// });