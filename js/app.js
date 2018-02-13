$(document).ready(function() {

	$("#img").change(function() {
		readURL(this);
	});

	$(document).on('click', '#review', function(){
		var data = '<div id="content"><h2>'+$("#title").val()+'</h2><img width="320" src="'+$("#blah").attr('src')+'" alt="your image" /><br><i>'+$("#descr").val()+'</i><br><br><b>Автор:</b> '+$("#username").val()+'  <b>Enail:</b> '+$("#email").val()+' </div>';
		console.log(data);
		$("#modal_box").html(data);
		$("#modalReview").modal('show');
	});

	$("#list_tasks").dataTable({"iDisplayLength": 3});

	$(document).on('click', '#login', function(){
		$("#modalLogin").modal('show');
	});
});

	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


