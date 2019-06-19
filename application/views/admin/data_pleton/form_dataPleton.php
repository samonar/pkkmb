<form action="<?php echo base_url($action).'/'.$id?>" method="post" class="col-md-6 offset-md-3">
    <div class="form-group row">
        <label class="col-md-4 ">Nama Pleton</label>
        <div class="col-md-7">
            <input type="text" name="nama_pleton" id="nama_pleton" class="form-control" value="<?php echo $nama_pleton ?>" placeholder="Nama Pleton" required >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4 ">Nama Panitai(PJ)</label>
        <div class="col-md-7">
            <select name="panitia" id="panitia" class="form-control">
            <option selected>--Pilih Panitia--</option>
                <?php 
                foreach ($list_panitia as $key ) { ?>
                    <option <?php if($key->id_panitia==$id_panitia){echo "selected='selected' ";} ?> value="<?php echo $key->id_panitia ?>"><?php echo $key->nama_panitia ?></option>      
                <?php }
                ?>
                
            </select>
        </div>
    </div>

        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("data_pleton")?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>