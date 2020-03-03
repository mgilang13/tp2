<div class="container">
<?php
    foreach($satuPohon->result() as $row) {
?>
    <div class="content mt-2">
        <h1>Pohon <?= $row->nama; ?></h1>
        <h4 class="mt-n3"><em><?= $row->nm_latin; ?></em></h4>
        <hr class="mt-2 mb-2">
        <img src="<?= base_url('uploads/'.$row->pict);?>" alt="">
        <hr class="mt-2 mb-2">
        <h3>Status Konservasi</h3>
        <p><?= $row->status_kons; ?></p>
        <hr class="mt-2 mb-2">
        <h3>Description</h3>
        <p class="text-justify"><?= $row->description; ?></p>
        <hr class="mt-2 mb-2">
        <a href="<?= site_url('admin/Pohon/editPohon/'.$row->id); ?>" class="btn btn-warning">Edit Data Ini</a>
        <a href="#" onclick ="window.close()" class="btn btn-danger">Keluar</a>
    </div>
<?php
    }
?>
</div>