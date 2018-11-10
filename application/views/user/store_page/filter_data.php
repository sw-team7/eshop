<?php
foreach ($filter_product as $row) {
?>
<!-- product -->
<div class="col-md-4 col-xs-6">
	<div class="product">
		<div class="product-img eshop-img">
			<img src="<?php echo base_url('assets/'.$row->image); ?>" alt="<?= $row->product_name?>">
			<div class="product-label">
				<span class="sale">-30%</span>
				<span class="new">NEW</span>
			</div>
		</div>
		<div class="product-body">
			<p class="product-category"><?= $row->cat_name?></p>
			<h3 class="product-name"><a href="<?= base_url('product/info/'.$row->product_id)?>"><?= $row->product_name?></a></h3>
			<h4 class="product-price"><?= $row->price?> <del class="product-old-price"><?= $row->price?></del></h4>
			<div class="product-rating">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
			</div>
			<div class="product-btns">
				<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
				<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
				<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
			</div>
		</div>
		<div class="add-to-cart">
			<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
		</div>
	</div>
</div>
<!-- /product -->
<?php } ?>