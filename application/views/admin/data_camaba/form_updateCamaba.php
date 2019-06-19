<form action="<?php echo base_url($action).'/'.$id_camaba?>" method="post" enctype="multipart/form-data" class="col-md-6 offset-md-3">

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
            <select name="id_prodi" id="idprodi" class="form-control">
                <option selected disabled>--Pilih Prodi--</option>
                    <?php foreach($listPleton as $key){ ?>
                        <option <?php if ($key->id_pleton==$id_pleton) { echo ' selected="selected"' ;}?> 
                        value="<?php echo $key->id_pleton ?>"><?php echo ucwords($key->nama_pleton) ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
            <label class="col-md-4 ">Foto</label>
            <div class="col-md-7">
                <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $foto ?>" placeholder="Masukkan foto" >
            </div>
    </div>
    

        <button type="cancel" class="btn btn-default ">
            <a href="<?php echo base_url("data_camaba/read_mabaProdi/".$id_prodi)?>">Cancel</a>
        </button>
        <button type="submit" class="btn btn-info float-right">Simpan</button>
</form>

////batas/////

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center"s>
                    CKEditor5
                    </h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    
                </div>
            </div>
            <!-- /.card -->
        </div>
    <!-- /.col-->
    <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center" >
                    CKEditor5
                    </h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>
    <!-- ./row -->
</section>