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
				<div class="table-responsive form-group">
					<table class="table table-bordered">
						<thead>
						<tr>
							<td class="text-center">SL</td>
							<td class="text-center">Image</td>
							<td class="text-left">Product Name</td>
							<td class="text-left">ID</td>
							<td class="text-left">Quantity</td>
							<td class="text-right">Unit Price</td>
							<td class="text-right">Total</td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<?php
							$i = 0;
							$sum = 0;
							$currencySymbol = '৳';
							foreach ($cart as $row) {
								$i++;
							?>
							<td class="text-center"><?php echo $i; ?></td>
							<td class="text-center align-middle"><a
									href="product.php?proid=<?=$row->product_id; ?>"><img width="70px" src="<?php echo base_url('assets/'.$row->image); ?>" alt="<?=$row->product_name; ?>"></a>
							</td>
							<td class="text-left"><a
									href="product.php?proid=<?=$row->product_id; ?>"><?=$row->product_name; ?></a><br/>
							</td>
							<td class="text-left"><?=$row->product_id; ?></td>
							<td class="text-left" width="200px">
								<form action="" method="post" class="input-group btn-block quantity">

									<input type="hidden" name="cart_id" value="<?=$row->cart_id; ?>"/>

									<div class="qty-label cart-qty">
										<div class="input-number">
											<input type="number" name="quantity" value="<?=$row->quantity; ?>">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>

									<span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i
								class="fa fa-clone"></i></button>
                        <div data-toggle="tooltip" class="btn btn-danger"><a
								onclick="return confirm('Are you sure to delete !!') "
								href="?deleteProduct=<?=$row->cart_id; ?>"><i
									class="fa fa-times-circle"></i></a></div>
                        </span>
								</form>
							</td>
							<td class="text-right"><?php echo $currencySymbol . " " . $row->price; ?></td>
							<td class="text-right">
								<?php
								echo $currencySymbol . " ";
								$Total = $row->price * $row->quantity;
								echo $Total;
								$qty = $row->quantity;
								$sum = $sum + $Total;
								?>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

				<?php
				if ($cart != null) {
				?>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-8">
						<table class="table table-bordered">
							<tbody>
							<tr>
								<td class="text-right">
									<strong>Sub-Total:</strong>
								</td>
								<td class="text-right"><?php echo $currencySymbol . " " . $sum; ?></td>
							</tr>
							<!-- <tr>
                                <td class="text-right">
                                    <strong>Flat Shipping Rate:</strong>
                                </td>
                                <td class="text-right">$4.69</td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Eco Tax (-2.00):</strong>
                                </td>
                                <td class="text-right">$5.62</td>
                            </tr> -->
							<tr>
								<td class="text-right">
									<strong>VAT (20%):</strong>
								</td>
								<td class="text-right"><?php echo $currencySymbol . " " . ($vat = $sum * 0.2); ?></td>
							</tr>
							<tr>
								<td class="text-right">
									<strong>Total:</strong>
								</td>
								<td class="text-right">
									<?php
									echo $currencySymbol . " ";
									$grantTotal = $sum + $vat;
									echo $grantTotal;
									?>
								</td>
							</tr>
							</tbody>
						</table>
						<?php } ?>
					</div>
				</div>

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
