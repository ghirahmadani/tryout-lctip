 <!--Banner Section-->
 <section class="banner-event">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 jeruk1">
                    <div class="clipart-jeruk2"><img src="<?=base_url()?>resources/img/clipart/Plant Based Daging.png"></div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="content text-center">
                    <p class="h1">Registration Form</p>
                    <div class="btn-box">
                        <p class="" style="color: #faaC1D;">Home | Registration</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="clipart-jeruk1"><img src="<?=base_url()?>resources/img/clipart/Plant Based Daging.png"></div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section-->

    <!-- Form Secction -->
    <form action="<?=base_url()?>register_post" method="post" enctype="multipart/form-data">
        <div class="container section-regis">
            <?php if(isset($_SESSION["msg"])): ?>
                <div class="row mb-5 justify-content-center">
                    <div class="col-12 text-center p-3" style="background: #336633">
                        <p class="text-white mb-0"><?=$_SESSION["msg"]?></p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center">
            
                <div class="col-12 col-lg-8 col-md-10 mb-3" style="position: relative;">
                    <img src="<?=base_url()?>resources/img/gradasi.png" style="width: 500px;position: absolute;right: -500px;top: -300px;z-index: -1;opacity: 60%;">
                    <h3 class="text-green"><b>Data Tim</b></h3>
                    <div class="form-group">
                        <label class="text-green" for="">Nama Tim</label>
                        <input required name="team_name" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Nama Sekolah</label>
                        <input required name="school_name" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Alamat Sekolah</label>
                        <input required name="school_address" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Email Sekolah</label>
                        <input required name="school_email" type="email" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">No. Telp Sekolah</label>
                        <input required name="school_telp" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Regional</label>
                        <select class="form-control input-border-green mb-3" required name="school_region" id="">
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="6">VI</option>
                            <option value="7">VII</option>
                            <option value="8">VIII</option>
                        </select>

                        <div id="accordion">
                            <div class="card">
                                <div class="card-header p-0" id="headingOne">
                                    <p class="btn accordion-faq mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Ketuk untuk melihat regional mu.
                                    </p>
                                    <i class="fa fa-chevron-down icon-faq icon-accordion-faq-active"></i>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Regional I - Bogor</p>
                                        <p>Regional II - DKI Jakarta dan Banten</p>
                                        <p>Regional III - Jawa Barat</p>
                                        <p>Regional IV - Lampung, Sumatera Selatan, Bengkulu, dan Bangka Belitung</p>
                                        <p>Regional V - NAD, Sumatera Utara dan Barat, Riau, dan Kepulauan Riau</p>
                                        <p>Regional VI - Jawa Tengah dan DI Yogyakarta</p>
                                        <p>Regional VII - Jawa Timur, Bali, NTB, dan NTT</p>
                                        <p>Regional VIII - Kalimantan, Sulawesi, Maluku, dan Papua</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-10 mb-3" style="position: relative">
                    <img src="<?=base_url()?>resources/img/gradasi.png" style="width: 500px;position: absolute;left: -650px;top: -100px;z-index: -1;opacity: 60%;">
                    <h3 class="text-green"><b>Data Individu - Pembimbing</b></h3>
                    <div class="form-group">
                        <label class="text-green" for="">Nama</label>
                        <input required name="mentor_name" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">NIP</label>
                        <input required name="mentor_nip" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">No. HP</label>
                        <input required name="mentor_telp" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Email</label>
                        <input required name="mentor_email" type="email" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto Formal</label>
                        <input required name="mentor_photo" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto/Scan KTP</label>
                        <input required name="mentor_ktp" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-10 mb-3" style="position: relative">
                    <img src="<?=base_url()?>resources/img/gradasi.png" style="width: 500px;position: absolute;right: -550px;top: 300px;z-index: -1;opacity: 60%;">
                    <h3 class="text-green"><b>Data Individu - Ketua Tim</b></h3>
                    <div class="form-group">
                        <label class="text-green" for="">Username</label>
                        <input required name="username" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Password</label>
                        <input required name="password" type="password" class="form-control input-border-green">
                        <small class="text-green">*Username dan Password digunakan untuk Online Test</small>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Nama</label>
                        <input required name="name" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">NIP</label>
                        <input required name="nip" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">No. HP</label>
                        <input required name="handphone" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Email</label>
                        <input required name="email" type="email" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto Formal</label>
                        <input required name="formal_photo" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto/Scan KTP</label>
                        <input required name="ktp_photo" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-10 mb-3" style="position: relative;">
                    <img src="<?=base_url()?>resources/img/gradasi.png" style="width: 500px;position: absolute;left: -550px;top: 600px;z-index: -1;opacity: 60%;">
                    <h3 class="text-green"><b>Data Individu - Anggota 1</b></h3>
                    <div class="form-group">
                        <label class="text-green" for="">Username</label>
                        <input required name="username2" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Password</label>
                        <input required name="password2" type="password" class="form-control input-border-green">
                        <small class="text-green">*Username dan Password digunakan untuk Online Test</small>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Nama</label>
                        <input required name="name2" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">NIP</label>
                        <input required name="nip2" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">No. HP</label>
                        <input required name="handphone2" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Email</label>
                        <input required name="email2" type="email" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto Formal</label>
                        <input required name="formal_photo2" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto/Scan KTP</label>
                        <input required name="ktp_photo2" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-10 mb-3">
                    <h3 class="text-green"><b>Data Individu - Anggota 2</b></h3>
                    <div class="form-group">
                        <label class="text-green" for="">Username</label>
                        <input required name="username3" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Password</label>
                        <input required name="password3" type="password" class="form-control input-border-green">
                        <small class="text-green">*Username dan Password digunakan untuk Online Test</small>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Nama</label>
                        <input required name="name3" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">NIP</label>
                        <input required name="nip3" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">No. HP</label>
                        <input required name="handphone3" type="text" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Email</label>
                        <input required name="email3" type="email" class="form-control input-border-green">
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto Formal</label>
                        <input required name="formal_photo3" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Foto/Scan KTP</label>
                        <input required name="ktp_photo3" type="file" class="form-control input-border-green">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-10 mb-3">
                    <h3 class="text-green"><b>Data Lain</b></h3>
                    <div class="form-group">
                        <label class="text-green" for="">Bukti Pembayaran</label>
                        <input required name="payment_proof" type="file" class="form-control input-border-green" accept="image/png, image/jpeg">
                        <small class="text-green">*Maks. Ukuran 2 mb.</small></br>
                    </div>
                    <div class="form-group">
                        <label class="text-green" for="">Surat Utusan Sekolah</label>
                        <input required name="mesengger_letter" type="file" class="form-control input-border-green" accept="image/png, image/jpeg">
                        <small class="text-green">*format upload .jpg, .png . Maks. Ukuran 1 mb.</small></br>
                        </br>
                        <label class="text-green" for="term1"><input required name="term1" required type="checkbox" id="term1"> Dengan menekan tombol ini anda telah setuju bahwa semua data yang dimasukan sudah benar</label><br>
                        <label class="text-green" for="term2"><input required name="term2" required type="checkbox" id="term2"> Dengan menekan tombol ini anda telah setuju mendaftar sebagai peserta LCTIP XXIX dan mematuhi syarat dan ketentuan yang berlaku</label>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-10 mb-3 text-end">
                    <button class="theme-btn btn-style-five padding-submit " type="reset">
                        <span class="btn-title">Reset</span>
                    </button>
                    <button class="theme-btn btn-style-one padding-submit" type="submit">
                        <span class="btn-title">Register</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
    <!-- Form Secction -->