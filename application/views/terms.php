<div class="container-fluid">
    <div class="row">
        <div class="col-2 text-center" style="min-height: 100vh;background: #336633; padding: 100px 0px">
            <a href="<?=base_url()?>dashboard"><div class="bg-white text-center d-inline-block" style="margin: 0px 10px; color: black; width: -moz-available; border-radius: 0px; padding: 5px 20px;">Profil</div></a>
            <div class="bg-white text-center d-inline-block mt-3" style="margin: 0px 10px; margin-right: 0px; color: black; width: -moz-available; border-radius: 0px; padding: 5px 20px;">Aturan</div>
            <a href="<?=base_url()?>logout"><div class="bg-white text-center d-inline-block mt-3" style="margin: 0px 10px; color: black; width: -moz-available; border-radius: 0px; padding: 5px 20px;">Keluar</div></a>
        </div>
        <div class="col-10 bg-white" style="padding: 100px;">
            <div class="section-header text-left" style="position: relative;">
                <p style="background-color: #336633; color: white; padding: 5px 20px;">Syarat</p>
            </div>
            <div class="px-3">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div class="section-header text-left" style="position: relative;">
                <p style="background-color: #336633; color: white; padding: 5px 20px;">Aturan & Ketentuan Ujian</p>
            </div>
            <div class="px-3">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <?php if(isset($_SESSION["message_info"])): ?>
                <div class="alert alert-success mt-3" role="alert">
                    <?=$_SESSION["message_info"]?>
                </div>
            <?php endif; ?>
            <form action="<?=base_url()?>online-test/1" method="POST">
                <div class="px-3">
                    <label class="text-green" for="term2"><input required name="term2" required type="checkbox" id="term2"> Saya setuju dengan aturan diatas</label>
                </div>

                <button class="btn text-white w-100" style="background: #993366;" type="submit">Mulai</button>
            </form>    
        </div>
    </div>
</div>