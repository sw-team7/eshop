<script>
	$(document).ready(function () {
		showCart();

		function minmax(value, min, max) {
			if (parseInt(value) < min || isNaN(parseInt(value)))
				return min;
			else if (parseInt(value) > max)
				return max;
			else return value;
		}

		function showCart() {
			$.ajax({
				url: base_url + "cart/getcart",
				method: "POST",
				dataType: "TEXT",
				success: function (data) {
					$('#show-cart-data').html(data);
				}
			})
		}

		function updateCart(id, qty) {
			qty = minmax(qty, 1, 100);
			if (id != '') {
				$.ajax({
					url: "<?php echo base_url();?>cart/upCart",
					method: "POST",
					data: {
						id: id,
						qty: qty
					},
					dataType: "JSON",
					success: function (data) {
						// alert(data.success);
						showCart();
					}
				})
			} else {
				$('#data-table').css('display', 'none');
			}
		}

		$(document).on('click', '.qty-up', function () {
			var input = $(this).siblings('input');
			var id = input.attr('data-id');
			var prev_qty = input.val();
			var new_qty = parseInt(prev_qty) + 1;
			input.val(new_qty);
			updateCart(id, new_qty);
		});

		$(document).on('click', '.qty-down', function () {
			var input = $(this).siblings('input');
			var id = input.attr('data-id');
			var prev_qty = input.val();
			var new_qty = parseInt(prev_qty) - 1;
			input.val(new_qty);
			updateCart(id, new_qty);
		});

		$(document).on('change', '.updateQty', function (event) {
			var id = $(this).attr('data-id');
			var qty = $(this).val();
			// exit();
			updateCart(id, qty);
		});

	});
</script>
