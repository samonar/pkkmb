
    <table class="table table-hover table-striped">
        <tbody>
            <?php foreach ($listInfo as $listInfo) { ?>
            <tr>
                <td>
                <div class="card-body p-0" >
                    <div class="mailbox-read-info" style="padding-bottom:23px">
                        <a href="<?php echo 'welcome/detail/'.$listInfo->id_info ?>"><h5><?php echo $listInfo->informasi ?></h5></a>
                            <span class="mailbox-read-time float-left"><?php echo $listInfo->nama_panitia .'('. date("d-m-Y", strtotime($listInfo->waktu))?>)</span></h6>
                    </div>
                        <div class="mailbox-read-message">
                        <?php echo substr($listInfo->keterangan,'0','150')?>
                        <a href=<?php echo 'welcome/detail/'.$listInfo->id_info ?> 'style='font-size: 160%'> Read More</a>
                    </div>
                </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
    <?php echo $this->pagination->create_links();?>    
    
    
    