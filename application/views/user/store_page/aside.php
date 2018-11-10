<!-- ASIDE -->
<div id="aside" class="col-md-3">
	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Categories</h3>
		<div class="checkbox-filter">
			<?php $i=0; foreach ($all_category as $cat) { $i++; ?>
			<div class="input-checkbox">
				<input type="checkbox" class="common_selector category" id="category-<?=$i;?>" value="<?=$cat->cat_id?>">
				<label for="category-<?=$i;?>">
					<span></span>
					<?=$cat->cat_name?>
					<small><?php //echo '(120)';?></small>
				</label>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- /aside Widget -->

	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Price</h3>
		<div class="price-filter">
			<div id="price-slider"></div>
			<div class="input-number price-min">
				<input id="price-min" type="number">
				<span class="qty-up">+</span>
				<span class="qty-down">-</span>
			</div>
			<span>-</span>
			<div class="input-number price-max">
				<input id="price-max" type="number">
				<span class="qty-up">+</span>
				<span class="qty-down">-</span>
			</div>
		</div>
	</div>
	<!-- /aside Widget -->

	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Brand</h3>
		<div class="checkbox-filter">
			<?php $i=0; foreach ($all_brand as $brand) { $i++; ?>
			<div class="input-checkbox">
				<input type="checkbox" class="common_selector brand"  id="brand-<?=$i;?>" value="<?=$brand->brand_id?>">
				<label for="brand-<?=$i;?>">
					<span></span>
					<?=$brand->brand_name?>
					<small>(578)</small>
				</label>
			</div>
			<?php } ?>
		</div>
	</div>
	<!-- /aside Widget -->

	<!-- aside Widget -->
	<div class="aside">
		<h3 class="aside-title">Top selling</h3>
		<?php $i=0; foreach ($top_product as $prod) { $i++; ?>
		<div class="product-widget">
			<div class="product-img">
				<img src="<?php echo base_url('assets/'.$prod->image); ?>" alt="<?=  $prod->product_name?>">
			</div>
			<div class="product-body">
				<p class="product-category"><?=$prod->cat_name?></p>
				<h3 class="product-name"><a href="#"><?=$prod->product_name?></a></h3>
				<h4 class="product-price"><?=$prod->price?> <del class="product-old-price"><?=$prod->price?></del></h4>
			</div>
		</div>
		<?php } ?>
	</div>
	<!-- /aside Widget -->
</div>
<!-- /ASIDE -->
