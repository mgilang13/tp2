<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><span><i class="fas fa-fw fa-leaf"></i></span> Data Pohon</h1>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
        <a href="<?= base_url('admin/Pohon/tambahPohon')?>" class="btn btn-success btn-tambah-pohon"><span><i class="fas fa-fw fa-plus"></i></span> Tambah Pohon</a>
        <a target="_blank" href="<?= site_url('/Home/showJSON'); ?>" class="btn btn-primary btn-tambah-pohon ml-2">Show JSON Datas</a>
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
                <?php
                    $no=1;
                    if($read_data->num_rows() > 0) {
                        foreach($read_data->result() as $row)
                        {
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama?></td>
                            <td><em><?= $row->nm_latin?></em></td>
                            <td><?= $row->status_kons?></td>
                            <td><?= $row->id_inputer?></td>
                            <td>
                                <a href="<?= site_url('admin/Pohon/downloadQR/'.$row->id); ?>" class="badge badge-primary">Download QR</a>
                                <a href="#" onclick="view()" class="badge badge-secondary text-light">View</a>
                                <a href="#" onclick="edit()" class="badge badge-warning">Edit</a>
                                <a data-toggle="modal" data-target="#delete-modal" href="#" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete-modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete it?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="<?= site_url('admin/Pohon/deleteProcess/'.$row->id); ?>" class="btn btn-danger">DELETE DATA POHON</a>
                            </div>
                            </div>
                        </div>
                        </div>
                <?php
                        }
                    } else {
                ?>
                    <tr>
                        <td colspan="6" align="center">No data found!</td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<style>
.btn-tambah-pohon {
	margin-bottom: 20px !important;
}
</style>

<script>
    function view() {
        let newWin = window.open('<?= base_url('admin/Pohon/viewPohon/'.$row->id); ?>', 'View Data Pohon', 'width=800,height=760');
    }

    function edit() {
        let newWin = window.open('<?= base_url('admin/Pohon/editPohon/'.$row->id); ?>', 'Edit Data Pohon', 'width=800,height=760');
    }
</script>
