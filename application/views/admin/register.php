<div class="container">
<div class="my-5 row justify-content-center">
    <div class="col-lg-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            
          <div class="col-lg">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar akun!</h1>
                </div>
                <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>">
                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                      <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Kata Sandi">
                  </div>
                </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                </form>
                <hr>
                
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login!</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

  </div>
</div>
</div>