<form action="<?php echo base_url($action).'/'.$id?>" method="post" class="col-md-6 offset-md-3">
    <div class="form-group row">
        <label class="col-md-4 ">Nama Panitia </label>
        <div class="col-md-7">
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama_panitia ?>" placeholder="Nama" required >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Jabatan Panitia</label>
        <div class="col-md-4">
            <select  name="jabatan" id="jk" class="form-control" placeholder="" required>
                <option disabled selected value="l">--Pilih Jabatan--</option>
                <option value="pembimbing">Pembimbing</option>
                <option value="pendamping">Pendamping</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Username</label>
        <div class="col-md-7">
            <input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php echo $username ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-4">Password</label>
        <div class="col-md-7">
            <input type="password" name="password" id="password" class="form-control" placeholder="password" value="<?php echo $password ?>" required>
        </div>
    </div>
    

        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("user")?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>