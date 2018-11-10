<button onclick="$('#loading').show(0)">Save</button><script type="text/javascript">

$(document).ready(function () {
	filter_data();
	function filter_data() {
		$('.filter_data').html('<div id="loading" style=""></div>');
		var action = 'filter_data';
		var minimum_price = $('#hidden_minimum_price').val();
		var maximum_price = $('#hidden_maximum_price').val();
		var category = get_filter('category');
		var brand = get_filter('brand');
		$.ajax({
			url: base_url + 'store/filtersearch',
			method: 'POST',
			data: {
				action: action,
				minimum_price: minimum_price,
				maximum_price: maximum_price,
				category: category,
				brand: brand
			},
			dataType: "HTML",
			success:function (data) {
				$('.filter_data').html(data);
			}
		});
	}

	function get_filter(class_name) {
		var filter = [];
		$('.'+class_name+':checked').each(function(){
			filter.push($(this).val());
		});
		return filter;
	}

	$(".common_selector").click(function (event) {
		filter_data();
	});
});

</script>