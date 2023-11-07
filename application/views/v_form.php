
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-3 mb-5" style="background: #00000005;">
                <h2 class="text-center">Form Log</h2>
                <form action="<?php echo site_url('LogController/add'); ?>" method="post" enctype="multipart/form-data" >
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"  placeholder="Tanggal">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Jam Masuk</label>
                                <input type="time" step="1" name = "jam_masuk" class="form-control"  placeholder="Jam Masuk">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Jam Keluar</label>
                                <input type="time" step="1" name = "jam_keluar" class="form-control"  placeholder="Jam keluar">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Aktivitas</label>
                                <textarea name="log_aktifitas" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">Output</label>
                                <textarea name="output" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">File Aktivitas</label>
                                <input type="file" name="file" accept="application/pdf" class="form-control" id="">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label">File Output</label>
                                <input type="file" name="file_output" accept="application/pdf" class="form-control" id="">
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="mb-3 btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>