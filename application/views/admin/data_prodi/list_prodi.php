<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url('data_prodi/create') ?>">
<button type="button" class="btn btn-outline-info btn-sm " style="margin-bottom: 10px;">
    Tambah Prodi &nbsp
    <i class="fa fa-plus"></i> 
</button>
</a>


<table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <tr>
                    <th style="text-align: center; width: 30px;">No</th>
                    <th style="text-align: center; ">Nama Prodi</th>
                    <th style="text-align: center; width: 30%;">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $i=0;
        foreach ($list_prodi as $key) {
            ?>
            <tr>
                <td style="text-align: center"> <?php echo ++$i ?> </td>
                <td style="text-align: center"><?php echo ucwords($key->prodi)  ?></td>
                <td style="text-align: center">
                    <a href="<?php echo base_url('data_prodi/detail_dataProdi/'.$key->id_prodi)?>">
                        <span class="text-primary" style="font-size:21px">
                                <i class="fas fa-pencil-alt"></i>
                        </span>
                    </a> | 
                    <a href="<?php echo base_url('data_prodi/delete/'.$key->id_prodi)?>" onclick="return checkDelete()">
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