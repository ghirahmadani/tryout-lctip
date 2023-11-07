<div class="container-fluid">
    <div class="row">
        <div class="col-2 text-center" style="min-height: 100vh;background: #faaC1D; padding: 100px 0px">
            <div class="bg-white text-center d-inline-block" style="margin: 0px 10px; margin-right: 0px; color: black; width: -moz-available; border-radius: 0px; padding: 5px 20px;">Profil</div>
            <a href="<?=base_url()?>logout"><div class="bg-white text-center d-inline-block mt-3" style="margin: 0px 10px; color: black; width: -moz-available; border-radius: 0px; padding: 5px 20px;">Keluar</div></a>
        </div>
        <div class="col-10 bg-white container-dashboard">
            <?php if(isset($_SESSION["message_info"])): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?=$_SESSION["message_info"]?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 col-lg-3 col-md-3">
                    <img src="<?=$this->session->userdata("photo")?>" alt="" style="max-height: 300px;">
                </div>
                <div class="col-12 col-lg-7 col-md-7">
                    <div class="form-group">
                        <label class="text-green font-weight-bold" for="">Nama</label>
                        <p><?=$this->session->userdata("name")?></p>
                    </div>
                    <div class="form-group">
                        <label class="text-green font-weight-bold" for="">Asal Sekolah</label>
                        <p><?=$this->session->userdata("school")?></p>
                    </div>
                    <div class="form-group">
                        <label class="text-green font-weight-bold" for="">NIP</label>
                        <p><?=$this->session->userdata("nip")?></p>
                    </div>
                    <div class="form-group">
                        <label class="text-green font-weight-bold" for="">Tim</label>
                        <p><?=$this->session->userdata("team")?></p>
                    </div>
                </div>
                <div class="col-12">
                    <?php if($date_now < $test["start"]): ?>
                        <div class="alert alert-success mt-3" role="alert">Jadwal tryout anda akan dimulai pada <?=$date_label?></div>
                    <?php elseif($date_now >= $test["end"]): ?>
                        <div class="alert alert-success mt-3" role="alert">Waktu tryout anda sudah selesai</div>
                    <?php else : ?>
                        <div class="alert alert-success mt-3" role="alert">Tryout sedang berlangsung</div>
                    <?php endif; ?>    
                    
                </div>
                <div class="col-12 mt-3">
                    <div class="section-header text-left" style="position: relative;">
                        <p style="background-color: #faaC1D; color: white; padding: 5px 20px;">Aturan & Ketentuan Ujian</p>
                    </div>
                    <div class="px-3">
                        <ol>
                            <li style="list-style: unset;">Peserta menjawab soal pada situs <a href="https://tryout.lctipipb.com">https://tryout.lctipipb.com</a></li>
                            <li style="list-style: unset;">Peserta hanya dapat mengakses soal try out online melalui situs dengan menggunakan user ID dan password yang telah dikonfirmasi terdaftar setelah tahap verifikasi data pada Pendaftaran 1.</li>
                            <li style="list-style: unset;">Peserta hanya dapat mengerjakan soal sebanyak 1 kali (sekali attempt saja). Perlu diperhatikan bahwa soal akan ditampilkan berurutan dan tidak bisa kembali ke soal sebelumnya.</li>
                            <li style="list-style: unset;">Peserta mengerjakan soal secara individu.</li>
                            <li style="list-style: unset;">Soal try out terdiri dari 20 soal pilihan ganda dengan rincian: 4 soal matematika, 4 soal fisika, 4 soal kimia, 4 soal biologi, 45 soal pangan.</li>
                            <li style="list-style: unset;">Soal menggunakan bahasa Indonesia atau bahasa Inggris.</li>
                            <li style="list-style: unset;">Peserta dapat mengerjakan seluruh soal dalam waktu 90 menit terhitung sejak peserta menekan tombol attempt</li>
                            <li style="list-style: unset;">Tipe soal berupa pilihan ganda, sebab akibat, pernyataan 1,2,3,4, benar salah.</li>
                            <li style="list-style: unset;">Diperbolehkan menggunakan kalkulator (scientific) bukan kalkulator dari gawai seperti handphone.</li>
                            <li style="list-style: unset;">Gangguan koneksi internet dan perangkat bukan merupakan tanggung jawab panitia.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-dark">Contact Person</p>
                    <p class="text-dark"><i class="flaticon-whatsapp"></i> +6285773015929 (Naura)</p>
                    <p class="text-dark"><i class="flaticon-whatsapp"></i> +62895359631919 (Ahmad)</p>
                </div>
                <div class="col-12 text-right">
                    <form action="<?=base_url()?>online-test/1" method="POST">
                        <div class="px-3">
                            <label class="text-green" for="term2">Saya setuju dengan aturan diatas</label> <input required name="term2" required type="checkbox" id="term2">
                        </div>

                        <button class="btn text-white px-4" style="background: #D33C2D;">Start</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>