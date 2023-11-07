<div class="container-fluid" style="height: 100vh; background: #336633;">
    <div class="row justify-content-center">
        <div class="col-11 col-lg-4 col-md-4 bg-white text-center p-5" style="border-radius: 25px; margin-top: 100px;">
            <img src="<?=base_url()?>resources/img/lctip.png" alt="" style="width: 80%">
            <?php if(isset($_SESSION["message_info"])): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?=$_SESSION["message_info"]?>
                </div>
            <?php endif; ?>
            <form action="<?=base_url()?>admin_login" method="POST">
                <div class="form-group mt-3">
                    <input required name="username" type="text" class="form-control input-border-green" placeholder="username or email">
                </div>
                <div class="form-group">
                    <input required name="password" type="password" class="form-control input-border-green" placeholder="password">
                </div>
                <button class="btn text-white w-100" style="background: #993366;" type="submit">Login</button>
            </form>    
        </div>
    </div>
</div>