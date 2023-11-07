<div class="container">
    <div class="row mb-3 mt-3">
        <div class="col-6">
            <h3 class="text-success">Daftar Log</h3>
        </div>
        <div class="col-6 text-end">
            <a href="<?=base_url()?>LogController/daftar"><button class="btn btn-sm btn-success">+ Tambah data</button></a>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if(isset($_GET['msg'])):?>
                <div class="alert alert-success" role="alert">
                    <?=$_GET['msg']?>
                </div>
            <?php endif; ?>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Tanggal </th>
                        <th> Jam Masuk </th>
                        <th> Log Aktifitas </th>
                        <th> Jam Keluar </th>
                        <th> Output </th>
                        <th> File Log </th>
                        <th> File Output </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        foreach ($isi_content as $v){
                            ?>
                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $v->tanggal; ?> </td>
                                <td> <?php echo $v->jam_masuk; ?> </td>
                                <td> <?php echo $v->log_aktifitas; ?> </td>
                                <td> <?php echo $v->jam_keluar; ?> </td>
                                <td> <?php echo $v->output; ?> </td>
                                <td> <a href="<?=base_url().$v->file?>" target="_blank"><button class="btn btn-sm btn-info text-light">Download File</button></a> </td>
                                <td> <a href="<?=base_url().$v->file_output?>" target="_blank"><button class="btn btn-sm btn-info text-light">Download File</button></a> </td>
                                <td> 
                                    <a href="<?php echo site_url('LogController/editData/')?><?php echo $v->id_log?>"><button class="btn btn-sm btn-warning mb-1">Edit</button></a>
                                    <a href="<?php echo site_url('LogController/hapusData/')?><?php echo $v->id_log?>"><button class="btn btn-sm btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        $nomor++;
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
