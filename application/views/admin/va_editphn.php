<div class="container" onload="description()">
<?php
    foreach($satuPohon->result() as $row) {
?>
    <h1 class="mt-2">Form Edit Data Pohon</h1>
    <form enctype="multipart/form-data" action="<?= site_url('admin/Pohon/editProcess'); ?>" method="POST" class="content mt-3">
        <input type="hidden" value="<?= $row->id; ?>" name="id">
        <div class="form-group row">
            <h4 class="col mt-1"><b>Pohon </b></h4>
            <input name="nama" type="text" class="col-sm-9 ml-2 form-control" value="<?= $row->nama; ?>" />
        </div>
        <div class="form-group row">
            <h4 class="col mt-1"><b>Nama Latin </b></h4>
            <input name="nm_latin" type="text" class="col-sm-9 ml-2 form-control t" value="<?= $row->nm_latin; ?>" />
        </div>
        <div class="form-group row">
            <h5 class="col"><b>Status Konservasi</b></h5>
            <input name="status" type="text" class="col-sm-9 ml-2 form-control" value="<?= $row->status_kons; ?>" />
        </div>
        <div class="form-group">
            <h4><b>Description</b></h4>
            <textarea name="description" id="description" type="text" class="col-sm-12 form-control text-justify" rows="10"><?= $row->description ?></textarea>
        </div>

        <hr class="mt-2 mb-2">
        <div class="form-group">
        Preview:<br>
        <img src="<?= base_url('uploads/'.$row->pict);?>" alt="">
        </div>
        <div class="form-group">
            <label for="input-gambar">Update Gambar Pohon</label>
            <input type="file" name="update_gambar" class="form-control-file" placeholder="Gambar Pohon">
            <?php $error = ""; ?>
            <small class="text-danger"><?= $error; ?></small>
        </div>
        <hr class="mt-2 mb-2">
        <input type="submit" class="border-0 btn btn-primary" value="Simpan Perubahan">
        <a href="#" class="btn btn-warning border-0" onclick="closeWindow()">Batal</a>
    </form>
<?php
    }
?>
</div>

<style>
    input {
        border: 1px solid purple !important;
    }

    .t {
        font-style:italic;
    }
</style>

<script>
function description() {
    document.getElementById('description').value="testing";
}
function closeWindow() {
    window.close();
}
</script>