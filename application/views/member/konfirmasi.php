<?php $pembelian = $this->pembelian_model->get_all(); ?>
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
            </div>

            <table class="table col-md-6">

            <?php 
            if(isset($error)){
                echo '<p class="aler alert-warning">'.$error.'</p>';
            }
            echo validation_errors('<p class="alert alert-warning">','</p>');
            echo form_open_multipart(base_url('dashboard/konfirmasi/'.$header_transaksi->id_transaksi));
            ?>
            <input type="hidden" name="id_pembelian" value="<?= $header_transaksi->id_pembelian ?>">
            <input type="hidden" name="id_transaksi" value="<?= $header_transaksi->id_transaksi ?>">
               <tr>
                    <td>Pembayaran ke rekening</td>
                    <td>
                        <select name="id_rekening" class="form-control">
                            <?php foreach ($rekening as $rekening) { ?>
                            <option value="<?= $rekening->id_rekening ?>"<?php if($header_transaksi->id_rekening==$rekening->id_rekening){ echo "selected";} ?>> 
                                <?= $rekening->nama_bank ?>
                                (No. Rekening:<?= $rekening->nomor_rekening ?> a.n <?= $rekening->nama_pemilik ?>)
                            </option>
                            <?php } ?>
                        </select> 
                    </td>
                </tr>
                <tbody>
                    <tr>
                        <td>Dari Bank</td>
                        <td>
                            <input type="text" name="nama_bank" class="form-control" value="<?= $header_transaksi->nama_bank?>"required placeholder="Nama Bank">
                        </td>
                    </tr>
                    <tr>
                        <td>Dari Nomor Rekening</td>
                        <td>
                            <input type="text" name="rekening_pembayaran" class="form-control" value="<?= $header_transaksi->rekening_pembayaran?>" required placeholder="Nomor Rekening">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Pemilik Rekening</td>
                        <td>
                            <input type="text" name="rekening_pelanggan" class="form-control" value="<?= $header_transaksi->rekening_pelanggan?>" required placeholder="Nama Pemilik Rekening">
                        </td>
                    </tr>
                    <tr>
                        <td>Upload Bukti Bayar</td>
                        <td>
                            <?php if ($header_transaksi->bukti_bayar==null) { ?>
                            <?php }else{ ?>
                            <img src="<?= base_url('assets/admin/image/').$header_transaksi->bukti_bayar?>" width="200"><?php } ?>
                            <input type="file" name="bukti_bayar" class="form-control mt-3" placeholder="Upload Bukti Pembayaran" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="w-size25">
                                <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" 
                                    type="submit" value="submit" class="btn submit_btn">Submit
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php 
            echo form_close();
            ?>
            <?php} ?>
            </table>

        </div>
    </div>
</section>