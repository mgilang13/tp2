<h1>Tambah Pohon</h1>
<form method="post" enctype="multipart/form-data" action="<?= site_url('admin/Pohon/add_process'); ?>" class="mt-4">
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama Pohon">
            <small class="text-danger"><?php echo form_error('nama');?></small>
        </div>
        <div class="form-group">
            <input type="text" name="nm_latin" class="form-control t" placeholder="Nama Latin">
            <small class="text-danger"><?php echo form_error('nm_latin');?></small>
        </div>
        <div class="form-group">
            <textarea type="textarea" name="description" class="form-control" placeholder="Description" rows="5"></textarea>
            <small class="text-danger"><?php echo form_error('description');?></small>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Status Konservasi" name="status">
        </div>
        <div class="form-group">
            <label for="input-gambar">Input Gambar Pohon</label>
            <input type="file" name="gambar_pohon" class="form-control-file" placeholder="Gambar Pohon">
            <?php $error = ""; ?>
            <small class="text-danger"><?= $error; ?></small>
        </div>
    </div>
    </div>
    <div class="col-12">
        <input type="submit" class="border-0 btn btn-success" value="Simpan Data Pohon">
        <a href="<?= site_url('admin/Pohon'); ?>" class="border-0 btn btn-warning">Lihat Data Pohon</a>
    </div>
</form>

<style>
input,textarea {
    border:1px solid purple !important;
}

.t {
    font-style:italic;
}
</style>