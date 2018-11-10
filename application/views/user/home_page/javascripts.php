<script>
	$(document).ready(function () {
		function showUser(user) {
			if (user != '') {
				$.ajax({
					url: base_url + "user/getuser",
					method: "GET",
					data: {
						user: user
					},
					dataType: "JSON",
					success: function (data) {
						$('#data-table').css('display', 'block');
						if (data.success) {
							$('#name').text(data.fullname);
							$('#email').text(data.email);
							$('#addr').text(data.address);
						} else {
							alert('error loading data');
						}
					}
				})
			} else {
				$('#data-table').css('display', 'none');
			}
		}
		
		$(document).on('change', 'select[data-id=userSearch]', function () {
			var user = $('option:selected', this).val();
			showUser(user);
		});


		$(".add-to-cart").click(function (event) {
			var id = $(this).attr('data-id');
			if (id != '') {
				$.ajax({
					url: "<?php echo base_url();?>cart/addtocart",
					method: "POST",
					data: {
						id: id
					},
					dataType: "JSON",
					success: function (data) {
						alert(data.checkCart);
					}
				})
			} else {
				$('#data-table').css('display', 'none');
			}
		});
		$("#search").click(function (event) {
			event.preventDefault();
			var user = $('#select_user').val();
			showUser(user);
		});
	});
</script>
