<?php require_once('views/web/layouts/index.php')?>
<?php startblock('title') ?>
  Thanh toán
<?php endblock() ?>
<?php startblock('content')?>
<?php require_once('views/web/layouts/includes/header.php') ?>

<div class="container">
	<div class="check-out">
		<h1>Checkout</h1>
		<div class="content">
			<table >
				<tr>
					<th>No</th>
					<th>Sản phẩm</th>
					<th></th>
					<th>Số lượng</th>		
					<th>Giá</th>
					<th>Tổng cộng</th>
					<th></th>
				</tr>
				<?php 
					$count = 0;
					$total = 0;
					foreach($cartList as $item)
					{
						$num = 0;
						foreach($cart as $value)
						{
							if($item['id'] == $value['id']){
								$num = $value['num'];
								break;
							}
						}
						$total += $num * $item['basePrice'];
				?>
				<tr>
					<td><?=++$count;?></td>
					<td>
						<?php $img = json_decode($item['img'])?>
						<img class="img-responsive" 
							style="width:185px ; height:207px; object-fit: contain"
							src="<?php echo asset("storage/{$img[0]}") ?>" 
							alt=""
						>
					<td><?=$item['name'];?></td>
					<td>
						<a class="btn btn-primary" href="<?php if($num > 1) {echo url('Cart/decreaseQuantity', ['id'=>$value['id']]);} else{echo url('Cart/delete', ['id'=>$value['id']]);}?>">-</a>
						<div class="" style="display: inline; padding: 6px 12px;"> 
							<?php echo $num;?>
						</div>
						<a class="btn btn-primary" href="<?php echo url('Cart/addToCart', ['id'=>$value['id']])?>">+</a>
					</td>
					<td><?=number_format($item['basePrice'], 0, '.', '.');?></td>
					<td><?=number_format($item['basePrice'] * $num , 0, '.', '.');?></td>
					<td><a class="btn btn-warning" href="<?php echo url('Cart/delete', ['id'=>$value['id']])?>">Delete</a></td>
				</tr>
				<?php } ?>
			</table>

			<form action="<?php echo url('checkout/handlecheckout', ['cart'=>$cart])?>" method="POST">
				<div class="row ">
					
					<div class="col-md-8">
						<div class="form-floating">
							<textarea class="form-control" rows="3" name="note" id="floatingTextarea2" ></textarea>
							<label for="floatingTextarea2">Ghi chú</label>
						</div>
					</div>

					<div class="col-md-4">
						<div class="table-total">
							<div class="table " >
								<tbody class="">
									<tr class="d-flex justify-content-end">
										<td >
											<h4>
												Tộng Tiền thanh toán : <?php echo $total?>
											</h4>
										</td>
									</tr>

									<tr>
										<input hidden name="total" value="<?php echo $total?>">
										<a href="<?php echo url('products/index') ?>" class=" to-buy">PROCEED TO BUY</a>
										<button class="btn btn-info" type="submit" >Thanh toán</button>
										<!-- <a class="btn btn-info" href="<?php echo url('checkout/handlecheckout', ['total'=>$total, 'cart'=>$cart ]) ?>">Thanh toán</a> -->
									</tr>

								</tbody>
							</div>
						</div>
					</div>

				</div>
			</form>
			
			
			</div>

		</div>
    	
		  <!-- <tr>
			<div class="sed">
				<h5>Sed ut perspiciatis unde</h5>
				<p>(At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium) </p>
			
			</div>
        <div class="clearfix"> </div></td>
        <td class="check"><input type="text" value="1" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}"></td>		
        <td>$100.00</td>
        <td>$100.00</td>
		  </tr> -->
		  
	
	
	<div class="clearfix"> </div>
  </div>
</div>

<?php require_once('views/web/layouts/includes/footer.php')?>
<?php endblock('content')?>
