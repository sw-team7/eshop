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
		<?php
		$i = 0;
		$sum = 0;
		$currencySymbol = '৳';
		foreach ($cart as $row) {
			$i++;
			?>
			<tr>
				<td class="text-center"><?php echo $i; ?></td>
				<td class="text-center align-middle"><a
						href="<?= base_url() ?>product/info/<?= $row->product_id; ?>"><img width="70px"
																						   src="<?php echo base_url('assets/' . $row->image); ?>"
																						   alt="<?= $row->product_name; ?>"></a>
				</td>
				<td class="text-left"><a
						href="<?= base_url() ?>product/info/<?= $row->product_id; ?>"><?= $row->product_name; ?></a><br/>
				</td>
				<td class="text-left"><?= $row->product_id; ?></td>
				<td class="text-left" width="200px">
					<form action="" method="post" class="input-group btn-block quantity">

						<input type="hidden" name="cart_id" value="<?= $row->cart_id; ?>"/>

						<div class="qty-label cart-qty">
							<div class="input-number">
								<input class="updateQty" type="number" name="quantity" value="<?= $row->quantity; ?>" data-id="<?= $row->cart_id; ?>" min="1" max="100">
								<span class="qty-up">+</span>
								<span class="qty-down">-</span>
							</div>
						</div>

						<span class="input-group-btn">
                        <button name="updateCart" type="submit" data-toggle="tooltip" title="Update"
								class="btn btn-primary"><i
								class="fa fa-clone"></i></button>
                        <div data-toggle="tooltip" class="btn btn-danger"><a
								onclick="return confirm('Are you sure to delete !!') "
								href="<?= base_url() ?>cart/delete?id=<?= $row->cart_id; ?>"><i
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
