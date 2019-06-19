<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url('user/create') ?>">
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
                    <th style="text-align: center; ">Nama Nasabah</th>
                    <th style="text-align: center; ">Jabatan Panitia</th>
                    <th style="text-align: center;width: 100px">Username</th>
                    <th style="text-align: center;width: 100px">Password</th>
                    <th style="text-align: center; width: 18%;">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $i=0;
        foreach ($list_nasabah as $key) {
            ?>
            <tr>
                <td style="text-align: center"> <?php echo ++$i ?> </td>
                <td><?php echo ucfirst($key->nama_panitia)  ?></td>
                <td style="text-align: center"><?php echo ucfirst($key->jabatan_panitia)  ?></td>
                <td style="text-align: center"><?php echo ($key->username)  ?></td>
                <td class="hidetext" ><?php echo ($key->password)  ?></td>
                <td style="text-align: center">
                    <a href="<?php echo base_url('user/detailUser/'.$key->id_panitia)?>">
                        <span class="text-primary" style="font-size:21px">
                                <i class="fa fa-eye"></i>
                        </span>
                    </a> | 
                    <a href="<?php echo base_url('user/delete/'.$key->id_panitia)?>" onclick="return checkDelete()">
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