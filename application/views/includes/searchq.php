<script>
			$(document).ready(function () {
				// sugestion box
				$('html').click(function (e) { 
					var container = $('#sg-box')
					if(!container.is(e.target) && container.has(e.target).length === 0){
						$('.sg-box').removeClass('visible')
					}
				});

				// serach
				$('.box-search input[name=q]').keyup(function (e) { 
					var length = $(this).val().length;
					var url = '<?php echo base_url("search-sg?q=") ?>'
					var search = $(this).val();
					var category =  $('.form-search select[name=category]').val();

					if (length > 1) {
						$.get(url+search+'&c='+category ,	function (data, textStatus, jqXHR) {
								$('.sg-box').addClass('visible')
								$('.sg-result').html(data);
							},
							"html"
						);
					}					
				});
			});
		</script>