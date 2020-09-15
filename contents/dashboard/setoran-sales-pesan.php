<?php

    //include koneksi
    include('../query/koneksi.php');

    if(isset($_POST['pesanSetoran'])){
        //id
        $id_setoran = $_POST['pesanSetoran'];
        //berdasarkan id pelanggan
        $result = mysqli_query($con, "CALL select_setoran_sales_by_id('".$id_setoran."')");
        mysqli_next_result($con);

        while($data = mysqli_fetch_assoc($result)){
            $pesan = $data['pesan'];
            $id = $data['id_setoran'];
        }
    }

?>
<input type="text" class="form-control form-control-user" id="id_users" name="id_users" value="<?= $id ?>" hidden>
<div class="form-group">
    <label for="keteranganditolak">Pesan Konfirmasi</label>
    <textarea class="form-control" id="keteranganditolak" name="keteranganditolak" rows="4" readonly><?= $pesan ?></textarea>
</div>