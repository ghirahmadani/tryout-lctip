<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-12">
        <form action="<?=base_url()?>change_password_post" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 col-md-10 mb-3">
                        <h3 class="text-green"><b>Change Password</b></h3>
                        <div class="form-group">
                            <p class="text-green" for=""><?=$user["name"]?></p>
                            <label class="text-green" for="">Password Baru</label>
                            <input hidden name="id_user" type="text" value="<?=$user["id_user"]?>">
                            <input required name="password" type="text" class="form-control input-border-green">
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 col-md-10 mb-3 text-end">
                        <button class="theme-btn btn-style-one padding-submit" type="submit">
                            <span class="btn-title">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>