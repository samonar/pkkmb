<form action="<?php echo base_url($action).'/'.$id?>" method="post" class="col-md-6 offset-md-3">
    <div class="form-group row">
        <label class="col-md-4 ">Nama Atribut </label>
        <div class="col-md-7">
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama_atribut ?>" placeholder="Nama" required >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Point</label>
        <div class="col-md-7">
            <input type="text" name="poin" id="poin" class="form-control" placeholder="Point" value="<?php echo $poin ?>" required>
        </div>
    </div>
        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("data_atribut")?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>