<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="<?=base_url()?>">Home</a></li>
					<li class="active">Shopping Cart</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div id="showdata"></div>
<?=session_id();?>
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
				<div class="section-title">
					<h3 class="title">Shopping Cart</h3>
				</div>
				<?php
					if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['updateCart'])){
						$this->load->helper('cart');
						updateCart($_POST);
					}
				?>
				<?php if($this->session->flashdata('cart-update')): ?>
				<div class="bg-success">
					<?php echo($this->session->flashdata('cart-update')); ?>
				</div>
				<?php endif; ?>

				<?php if($this->session->flashdata('cart-delete')): ?>
				<div class="bg-success">
					<?php echo($this->session->flashdata('cart-delete')); ?>
				</div>
				<?php endif; ?>
				<div id="show-cart-data"></div>
							<?php //$this->load->view('user/cart_page/ajax_cart')?>


				<div class="buttons">
					<div class="pull-left"><a href="<?=base_url()?>" class="btn btn-primary">Continue Shopping</a></div>
					<?php
					$custLogin = false;

					if ($custLogin == false) { ?>
						<div class="pull-right"><a href="<?=base_url('login')?>" class="btn btn-primary">Checkout</a></div>
					<?php } else { ?>
						<div class="pull-right"><a href="<?=base_url('payment')?>" class="btn btn-primary">Checkout</a></div>
					<?php } ?>
				</div>
			</div>
			<!--Middle Part End -->

		</div>
	</div>
</div>
<!-- //Main Container -->
