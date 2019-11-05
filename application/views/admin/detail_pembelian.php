<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<!-- css -->

<div class="container">
<h1 class="h3 mb-2 text-gray-800 mx-1">Detail Pembelian</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-5"> 
                <form class="col-lg-12" action="<?php echo base_url('admin/pembelian/detail_pembelian/.$transaksi->id_transaksi') ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach($transaksi as $data){ ?>
                    <div class="col-md-12">
                        <table class="table table-hover table-striped">
                            <tr><br>
                                <th width="200px">Kode Transaksi</th>
                                <td></td>
                                <td></td>
                                <td>: <?= $data->id_transaksi; ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Nama Lengkap</th>
                                <td></td>
                                <td></td>
                                <td>: <?= $data->nama; ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Email</th>
                                <td></td>
                                <td></td>
                                <td>: <?= $data->email; ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Alamat</th>
                                <td></td>
                                <td></td>
                                <td>: <?= $data->alamat; ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Telepon</th>
                                <td></td>
                                <td></td>
                                <td>: <?= $data->telepon; ?></td>
                            </tr>
                            <tr>
                                <th width="200px">Nama Bank</th>
                                <td></td>
                                <td></td>
                                <td>: 
                                <?php if ($data->nama_bank==null) { ?>
                                  -
                                <?php }else{ ?>
                                <?= $data->nama_bank; }?>
                                </td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td></td>
                                <td></td>
                                <td>: 
                                  <?php if ($data->rekening_pelanggan==null) { ?>
                                  -
                                  <?php }else{ ?>
                                  <?= $data->rekening_pelanggan; } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <td></td>
                                <td></td>
                                <td>:
                                  <?php if ($data->rekening_pembayaran==null) { ?>
                                  -
                                  <?php }else{ ?>
                                  <?= $data->rekening_pembayaran; } ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td></td>
                                <td></td>
                                <td>: <?= $data->status; ?></td>
                            </tr>
                            <tr>
                                <th>Bukti Transfer</th>
                                <td></td>
                                <td></td>
                                <td>:
                                  <?php if ($data->bukti_bayar==null) { ?>
                                  -
                                  <?php }else{ ?>
                                  <img id="myImg" src="<?= base_url(); ?>assets/admin/image/<?= $data->bukti_bayar ?>" width="200" ><?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div><br>
                    <a href="#" class="btn btn-secondary mb-3 ml-3 btn-icon-split" onclick="window.history.go(-1)">
                        <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                    <?php } ?>
                </form>               
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<!-- js -->
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>