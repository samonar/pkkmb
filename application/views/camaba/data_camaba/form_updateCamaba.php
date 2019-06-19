
<div class="row">
        <div class="col-sm-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-fluid mb-3" src="<?= base_url('assets/qrcode/'.$nim.'.png') ?>" alt="Photo">
                    </div>
                    <h3 class="profile-username text-center"><?php echo ucwords($nama) ?></h3>
                        
                    <p class="text-muted text-center"><?php echo $nim ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Prodi</b> 
                        <a style="margin-left:25px"> : </a>
                        <a class="float-right"><?php echo ucwords($prodi) ?></a>
                        </li>
                        <li class="list-group-item">
                        <b>Pleton</b> 
                        <a style="margin-left:18px"> : </a>
                        <a class="float-right"><?php echo ucwords($pleton) ?></a>
                    </ul>
                    <a href="<?= base_url('camaba/data_camaba/downloadQr/'.$nim.'') ?>" class="btn btn-primary btn-block"><b>Download QR</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">Edit Kelengkapan</h5>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <form action="<?php echo base_url($action).'/'.$id_camaba.'/'.$id_prodi?>" method="post" enctype="multipart/form-data" class="offset-md-1">
                            <div class="form-group row">
                                <label class="col-md-4">No HP</label>
                                <div class="col-md-7">
                                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" value="<?php echo $no_hp ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-md-4 ">Foto</label>
                                    <div class="col-md-7">
                                        <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $foto ?>" placeholder="<?php echo $foto ?>" >
                                    </div>
                            </div>


                                <button type="cancel" class="btn btn-default ">
                                    <a href="<?php echo base_url("data_camaba/read_mabaProdi/".$id_prodi)?>">Cancel</a>
                                </button>
                                <button type="submit" class="btn btn-info float-right">Simpan</button>
                        </form>
                    </div>
            <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
</div>