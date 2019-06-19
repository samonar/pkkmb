<div class="row">
        <div class="col-sm-3">
            <div class="card c">
                <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/foto_camaba/'.$foto) ?>" alt="User profile picture">
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
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-8">
            <div class="card ">
                <div class="card-body">
                    <div class="tab-content">
                    
                        <style>
                        .hidetext { -webkit-text-security: disc; /* Default */ }
                        </style>

                        <table class="table table-bordered table-striped" id="example1">
                            <thead>
                                <tr>
                                    <tr>
                                        <th style="text-align: center; width: 30px;">No</th>
                                        <th style="text-align: center; ">Poin</th>
                                        <th style="text-align: center; ">Tanggal</th>
                                        <th style="text-align: center; width: 18%;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            $i=0;
                            foreach ($list_presensi as $key) {
                                ?>
                                <tr>
                                    <td style="text-align: center"> <?php echo ++$i ?> </td>
                                    <td style="text-align: center"> <?php echo $key->keterangan ?> </td>
                                    <td style="text-align: center"><?php echo ucfirst($key->waktu_presensi)  ?></td>
                                    <td style="text-align: center">
                                        <a href="<?php echo base_url('data_presensi/update/'.$key->id_presensi.'/'.$key->id_camaba)?>">
                                            <span class="text-primary" style="font-size:21px">
                                                    <i class="fas fa-pencil-alt"></i>
                                            </span> 
                                        </a> |
                                        <a href="<?php echo base_url('data_presensi/delete/'.$key->id_presensi.'/'.$key->id_camaba)?>">
                                            <span class="text-primary" style="font-size:21px">
                                                    <i class="fa fa-trash"></i>
                                            </span>
                                        </a>
                                    </td>
                                    
                                </tr>
                            <?php   
                            }
                            ?>
                            </tbody>
                        </table>
                        <script language="javascript" type="text/javascript">
                        function checkDelete(){
                            return confirm('Yakin menghapus data ?');
                        }
                        </script>
                    </div>
            <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
</div>