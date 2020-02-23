<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><span><i class="fas fa-fw fa-leaf"></i></span> Data Pohon</h1>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table">
        <a href="<?= base_url('admin/Pohon/tambahPohon')?>" class="btn btn-success btn-tambah-pohon"><span><i class="fas fa-fw fa-plus"></i></span> Tambah Pohon</a>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NAMA POHON</th>
                    <th scope="col">NAMA LATIN</th>
                    <th scope="col">STATUS KONSERVASI</th>
                    <th scope="col">ID PENGINPUT</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Akasia</td>
                    <td><em>Acacia sp.</em></td>
                    <td>Aktif</td>
                    <td>mgilang13</td>
                    <td>
                        <a href="#">QR</a>
                        <a href="#">Edit</a>
                        <a href="#">Show</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
.btn-tambah-pohon {
	margin-bottom: 20px !important;
}
</style>