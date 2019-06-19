<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>

<table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <tr>
                    <th style="text-align: center; width: 30px;">No</th>
                    <th style="text-align: center; width: 10 px;">Foto</th>
                    <th style="text-align: center; ">Nama Nasabah</th>
                    <th style="text-align: center; ">NIM</th>
                    <th style="text-align: center">No HP</th>
                    <th style="text-align: center">Prodi</th>
                    <th style="text-align: center">Pleton</th>
                    <th style="text-align: center; width: 18%;">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $i=0;
        foreach ($list_camaba as $key) {
            ?>
            <tr>
                <td style="text-align: center"> <?php echo ++$i ?> </td>
                <td style="text-align: center"> 
                    <img src="<?php echo base_url('assets/foto_camaba/'.$key->foto)?>"
                    style="width:30px"  alt=""><?php ?>
                </td>
                <td><?php echo ucfirst($key->nama_camaba)  ?></td>
                <td style="text-align: center"><?php echo ucfirst($key->nim)  ?></td>
                <td style="text-align: center"><?php echo ($key->no_hp)  ?></td>
                <td style="text-align: center"><?php echo ucwords($key->prodi)  ?></td>
                <td ><?php echo ($key->nama_pleton)  ?></td>
                <td style="text-align: center">
                    <a href="<?php echo base_url('penilaian_kelengkapan/detail_penilaianKelengkapan/'.$key->id_camaba)?>">
                        <span class="text-primary" style="font-size:21px">
                                <i class="fas fa-pencil-alt">edit</i>
                        </span>
                    </a> | 
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