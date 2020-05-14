<?php

    if($status === 'waiting'){
        $badge = 'badge-warning';
        $status = 'Menunggu Pembayaran';
    }

    if($status === 'paid'){
        $badge = 'badge-secondary';
        $status = 'Dibayar';
    }

    if($status === 'delivered'){
        $badge = 'badge-success';
        $status = 'Dikirim';
    }

    if($status === 'process'){
        $badge = 'badge-primary';
        $status = 'Dalam proses';
    }

    if($status === 'cancel'){
        $badge = 'badge-danger';
        $status = 'Dibatalkan';
    }
?>

<?php if($status) : ?>
    <div class="badge badge-pill <?= $badge ?>"><?= $status ?></div>
<?php endif ?>