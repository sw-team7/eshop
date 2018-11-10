$(document).ready(function () {
	function showMiniCart() {
			$.ajax({
				url: base_url + "minicart/getMiniCart",
				method: "GET",
				data: {
					cart: 1
				},
				dataType: "JSON",
				success: function (data) {
					if (data.success) {
						var items = data.data;
						var i;
						var html = '';
						var summary = '';
						var total = 0;
						for(i=0; i<items.length; i++){
							html += '<div class="product-widget">'+
										'<div class="product-img">'+
											'<img src="'+base_url+'assets/'+items[i].image+'" alt="">'+
										'</div>'+
										'<div class="product-body">'+
											'<h3 class="product-name"><a href="#">'+items[i].product_name+'</a></h3>'+
											'<h4 class="product-price"><span class="qty">1x</span>'+items[i].price+'</h4>'+
										'</div>'+
										'<button class="delete minicartDel" data="'+items[i].cart_id+'"><i class="fa fa-close"></i></button>'+
									'</div>';
							total = total + items[i].price * items[i].quantity;
						}
						summary += '<small>'+items.length+' Item(s) selected</small>'+
									'<h5>SUBTOTAL: '+total+'</h5>';
						$('#cart-list').html(html);
						$('#cart-summary').html(summary);
					} else {
						var html = '';
						var summary = '';
						html += '<div class="btn btn-warning center-block">Cart Empty</div>';
						$('#cart-list').html(html);
						$('#cart-summary').html(summary);
					}
				}
			})
	}

	//delete- 
	$('#cart-list').on('click', '.minicartDel', function(){
		var id = $(this).attr('data');
		$.ajax({
			type: 'ajax',
			method: 'get',
			async: false,
			url: base_url + 'minicart/deleteProduct',
			data:{id:id},
			dataType: 'json',
			success: function(response){
				if(response.success){
					showMiniCart();
				}else{
					alert('Error');
				}
			},
			error: function(){
				alert('Error deleting');
			}
		});
	});

	$("#mini-cart").click(function (event) {
		//alert("Cart Clicked");
		showMiniCart();
	});
	$("#minicartDel").click(function (event) {
		//alert("Cart Clicked");
		showMiniCart();
	});
	
});