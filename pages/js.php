<script type="text/javascript">
	

$(document).ready(function() {

action('menu');


});


function action(action) {


// hiệu ứng ở đây

$('#loading').fadeIn(600);

$('#result').hide();




$.get('action/'+action+'.php', function(result) {

	setTimeout(function(){ // Delay time hiện loading

				$('#loading').hide();

			if(action == 'menu') {
				var show = result;
			}else {
				var show = '<div class="col-xl-12">'+result+'</div>';
			}

				$('#result').html(show);
				$('#result').fadeIn(600);
	}, 000);

			});
} 































</script>