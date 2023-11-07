
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-3 mb-5" style="background: #00000005;">
                <h2 class="text-center">Form Edit Log</h2>
                <form action="<?php echo site_url('LogController/updateData/'); ?>" method="post" enctype="multipart/form-data" >
                    <input type = "hidden" name = "id_log" value = "<?php echo $isi_content->id_log ?>"> 
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"  placeholder="Tanggal" value = "<?php echo $isi_content->tanggal ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Jam Masuk</label>
                                <input type="time" step="1" name = "jam_masuk" class="form-control"  placeholder="Jam Masuk" value="<?php echo $isi_content->jam_masuk ?>">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Jam Keluar</label>
                                <input type="time" step="1" name = "jam_keluar" class="form-control"  placeholder="Jam keluar" value="<?php echo $isi_content->jam_keluar ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Aktivitas</label>
                                <textarea name="log_aktifitas" class="form-control" id="" cols="30" rows="5"><?php echo $isi_content->log_aktifitas ?></textarea>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Output</label>
                                <textarea name="output" class="form-control" id="" cols="30" rows="5">v<?php echo $isi_content->output ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">File Aktivitas</label>
                                <input type="file" name="file" accept="application/pdf" class="form-control mb-3" id="">
                                <label for=""><a href="<?=base_url().$isi_content->file?>" target="_blank"><label for="">File Aktivitas</label></a>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">File Output</label>
                                <input type="file" name="file_output" accept="application/pdf" class="form-control mb-3" id="">
                                <a href="<?=base_url().$isi_content->file_output?>" target="_blank"><label for="">File Output</label></a>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="mb-3 btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>