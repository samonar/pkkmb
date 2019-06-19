<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url('excel/export/'.$id) ?>">
<button type="button" class="btn btn-outline-info btn-sm " style="margin-bottom: 10px;">
    Cetak Laporan &nbsp
    <i class="fa fa-print"></i> 
</button>
</a>


<table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <tr>
                    <th style="text-align: center; width: 30px;">No</th>
                    <th style="text-align: center; ">NIM</th>
                    <th style="text-align: center; ">Nama Nasabah</th>
                    <th style="text-align: center; ">Poin Absen</th>
                    <th style="text-align: center">Poin Atribut</th>
                    <th style="text-align: center">Poin Keaktifan</th>
                    <th style="text-align: center">Total</th>
                    <!-- <th style="text-align: center; width: 18%;">Action</th> -->
            </tr>
        </thead>

        <tbody>
        <?php
        $no=1;
        $i=0;
        foreach ($total as $key => $value) {
            ?>
            <tr>
                <td style="text-align: center"> <?php echo $no++ ?> </td>
                <td><?php echo ucfirst($list_camaba[$key]->nim)  ?></td>
                <td><?php echo ucfirst($list_camaba[$key]->nama_camaba)  ?></td>
                
                <td style="text-align: center"><?php if (isset($list_absensi[$key]->keterangan)) {
                    echo $list_absensi[$key]->keterangan;
                }else{
                    echo '0';
                }
                ?></td>

                <td style="text-align: center"><?php if (isset( $list_atribut[$key]->atribut)) {
                    echo $list_atribut[$key]->atribut;
                } else {
                    echo '0';
                }
                ?></td>

                <td><?php if (isset($list_aktif[$key]->aktif)) {
                    echo $list_aktif[$key]->aktif;
                }else{
                    echo '0';
                }
                ?></td>
                <td style="text-align: center"><?php  echo $value ?></td>
                <!-- <td style="text-align: center">
                    <a href="<?php echo base_url('data_camaba/detailCamaba/')?>">
                        <span class="text-primary" style="font-size:21px">
                                <i class="fa fa-eye"></i>
                        </span>
                    </a> | 
                    <a href="<?php echo base_url('data_camaba/delete/')?>" onclick="return checkDelete()">
                    <span class="text-primary" style="font-size:21px">
                                <i class="fa fa-trash"></i>
                        </span>
                    </a> 
                </td> -->
                
            </tr>
            <?php
            $i++;
    }
        ?>
        </tbody>
    </table>
    <script language="javascript" type="text/javascript">
    function checkDelete(){
        return confirm('Yakin menghapus data ?');
    }
    </script>