<form action="<?php echo base_url($action).'/'.$id?>" method="post" enctype="multipart/form-data" class="col-md-6 offset-md-3">

    <div class="form-group row">
            <label class="col-md-4 ">Nama Camaba </label>
            <div class="col-md-7">
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama ?>" placeholder="Nama" required >
            </div>
    </div>
    <div class="form-group row">
            <label class="col-md-4 ">NIM </label>
            <div class="col-md-7">
                <input type="text" name="nim" id="nama" class="form-control" value="<?php echo $nim ?>" placeholder="Nama" required >
            </div>
    </div>  
    <div class="form-group row">
        <label class="col-md-4">No HP</label>
        <div class="col-md-7">
            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" value="<?php echo $no_hp ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Prodi</label>
        <div class="col-md-7">
            <select name="id_prodi" id="idprodi" class="form-control">
            <option selected disabled>--Pilih Prodi--</option>
                <?php foreach($list_prodi as $key){ ?>
                    <option <?php if ($key->id_prodi==$id_prodi) { echo ' selected="selected"' ;}?> 
                    value="<?php echo $key->id_prodi ?>"><?php echo ucwords($key->prodi) ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Pleton</label>
        <div class="col-md-7">
            <input type="text" name="id_pleton" id="id_pleton" class="form-control" placeholder="Pleton" value="<?php echo $id_pleton ?>" required>
        </div>
    </div>
    <div class="form-group row">
            <label class="col-md-4 ">Foto</label>
            <div class="col-md-7">
                <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $foto ?>" placeholder="Masukkan foto" >
            </div>
    </div>
    

        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("data_camaba/read_mabaProdi/".$id)?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>