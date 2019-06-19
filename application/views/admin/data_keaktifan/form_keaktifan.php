<form action="<?php echo base_url($action).'/'.$id?>" method="post" class="col-md-6 offset-md-3">
    <div class="form-group row">
        <label class="col-md-4 ">Kategori Keaktifan </label>
        <div class="col-md-7">
            <input type="text" name="jenis_keaktifan" id="jenis_keaktifan" class="form-control" value="<?php echo $jenis_keaktifan ?>" placeholder="Nama" required >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Poin</label>
        <div class="col-md-7">
            <input type="text" name="poin" id="poin" class="form-control" placeholder="Point" value="<?php echo $poin ?>" required>
        </div>
    </div>
        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("data_keaktifan")?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>