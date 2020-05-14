<main role="main" class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="success-title ">
                        <h1 class="text-center"><img src="<?= base_url('assets/images/success.png') ?>"> Checkout berhasil!</h1>
                    </div>
                    <p class="text-center"><strong>Terima kasih sudah berbelanja</strong></p>
                    <hr>
                    <p class="text-center">Silahkan lakukan pembayaran agar pesanan anda dapat segera diproses </p>
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <table class="table table-borderless ">
                                <thead>
                                    <tr>
                                        <th class="h4">No orders</th>
                                        <th class="h4">:</th>
                                        <td class="h4"><?= $content->invoice ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="h4">Total</td>
                                        <td class="h4">:</td>
                                        <td class="h4">Rp <?= number_format($content->total, 0, ',', '.') ?>,-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="text-center">Lakukan konfirmasi pembayaran sesuai nominal diatas ke salah satu rekening dibawah ini : </p>
                    <div class="row">
                        <div class="col-md-7 mx-auto">
                            <ol>
                                <?php foreach($bank as $row) : ?>
                                    <li><strong><?= strtoupper($row['bank']) ?> <?= strtoupper($row['norek']) ?></strong> a/n <?= ucwords(strtolower($row['name'])) ?></li>
                                <?php endforeach ?>
                            </ol>
                        </div>
                    </div>
                    <p class="text-center">Jika sudah, silakan kirimkan bukti transfer di halaman konfirmasi atau bisa <a href="<?= base_url("myorder/confirm/$content->invoice") ?>">klik disini</a>!</p>
                    <a href="<?= base_url('/') ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
                </div>
			</div>
		</div>
	</div>
</main>