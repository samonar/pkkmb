<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.1/flatly/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>assets/plugins/datetime/css/tempusdominus-bootstrap-4.css" rel="stylesheet" type="text/css">


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
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">Edit Kelengkapan</h5>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                    
                        <style>
                        .hidetext { -webkit-text-security: disc; /* Default */ }
                        </style>
            <form action="<?php echo base_url($action).'/'.$data_kelengkapan->id_kelengkapan.'/'.$id_camaba?>" method="post" class="offset-md-1">
                <div class="form-group row">
                    <label class="col-md-4 ">Nama Atribut </label>
                    <div class="col-md-7">
                        <select name="id_atribut_kelengkapan" id="" class="form-control">
                            <?php
                                foreach ($listKelengkapan as $key ) { ?>
                                    <option <?php if ($data_kelengkapan->id_atribut_kelengkapan==$key->id_atribut_kelengkapan) {
                                       echo  "selected";
                                    } ?> value="<?php echo $key->id_atribut_kelengkapan ?>"> 
                                    <?php echo $key->nama_atribut ?> </option>
                                <?php }
                            ?>
                        </select>
                    </div>
                </div>
    
                <div class="form-group row ">
                <label class="col-md-4 ">Waktu</label>
                    <div class="col-md-7">
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" name="datetime" class="form-control datetimepicker-input" value="<?php echo date("m/d/Y h:i A", strtotime($data_kelengkapan->waktu)) ?>" data-target="#datetimepicker1"/>
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-4">Poin</label>
                    <div class="col-md-7">
                        <input type="number" name="poin" id="no_hp" class="form-control" value=<?php echo $data_kelengkapan->poin   ?>  disabled>
                    </div>
                </div>
                    <button type="cancel" class="btn btn-default ">
                        <a href="<?php echo base_url("penilaian_kelengkapan/detail_penilaianKelengkapan/".$id_camaba)?>">Cancel</a>
                    </button>
                    <button type="submit" class="btn btn-info float-right"> Simpan </button>
            </form>
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



<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datetime/js/tempusdominus-bootstrap-4.js"></script>

<script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                minDate: new Date(),
                // minDate: '03/06/2019',
                format: 'MM/DD/YYYY H:s A'
            });
        });
    </script>