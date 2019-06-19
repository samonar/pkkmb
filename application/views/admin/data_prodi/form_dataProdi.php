<form action="<?php echo base_url($action).'/'.$id?>" method="post" class="col-md-6 offset-md-3">
    <div class="form-group row">
        <label class="col-md-4 ">Nama Prodi</label>
        <div class="col-md-7">
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?php echo $prodi ?>" placeholder="Nama prodi" required >
        </div>
    </div>

        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("data_prodi")?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>