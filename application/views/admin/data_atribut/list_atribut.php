<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url($action) ?>">
<button type="button" class="btn btn-outline-info btn-sm " style="margin-bottom: 10px;">
    Tambah User &nbsp
    <i class="fa fa-plus"></i> 
</button>
</a>


<table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <tr>
                    <th style="text-align: center; width: 30px;">No</th>
                    <th style="text-align: center; ">Nama Atribut</th>
                    <th style="text-align: center; ">Point</th>
                    <th style="text-align: center; width: 18%;">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $i=0;
        foreach ($list_atribut as $key) {
            ?>
            <tr>
                <td style="text-align: center"> <?php echo ++$i ?> </td>
                <td><?php echo ucfirst($key->nama_atribut)  ?></td>
                <td style="text-align: center"><?php echo ucfirst($key->poin)  ?></td>
                <td style="text-align: center">
                    <a href="<?php echo base_url('data_atribut/detail_atribut/'.$key->id_atribut_kelengkapan)?>">
                        <span class="text-primary" style="font-size:21px">
                                <i class="fas fa-pencil-alt"></i>
                        </span>
                    </a> | 
                    <a href="<?php echo base_url('data_atribut/delete/'.$key->id_atribut_kelengkapan)?>" onclick="return checkDelete()">
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