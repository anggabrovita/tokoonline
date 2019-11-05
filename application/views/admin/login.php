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
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                    <?= $this->session->flashdata('message'); ?>
                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                        <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Kata Sandi">
                        <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    </form>
                  <hr>
                  <div class="text-center">
                      <a class="small" href="<?= base_url('auth/register'); ?>">Daftar Akun!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
