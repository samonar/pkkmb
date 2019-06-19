<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url($action) ?>">
<button type="button" class="btn btn-outline-info btn-sm " style="margin-bottom: 10px;">
    Tambah Pleton &nbsp
    <i class="fa fa-plus"></i> 
</button>
</a>


<table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <tr>
                    <th style="text-align: center; width: 30px;">No</th>
                    <th style="text-align: center; ">Nama Pleton</th>
                    <th style="text-align: center; ">Panitia (PJ)</th>
                    <th style="text-align: center; width: 30%;">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $no=0;
        foreach ($list_pleton as $key) {
            ?>
            <tr>
                <td style="text-align: center"> <?php echo ++$no ?> </td>
                <td style="text-align: center"><?php echo ucwords($key->nama_pleton)  ?></td>
                <td style="text-align: center"><?php echo ucwords($key->nama_panitia)  ?></td>
                <td style="text-align: center">
                    <a href="<?php echo base_url('data_pleton/detail_dataPleton/'.$key->id_pleton)?>">
                        <span class="text-primary" style="font-size:21px">
                                <i class="fas fa-pencil-alt"></i>
                        </span>
                    </a> | 
                    <a href="<?php echo base_url('data_pleton/delete/'.$key->id_pleton)?>" onclick="return checkDelete()">
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