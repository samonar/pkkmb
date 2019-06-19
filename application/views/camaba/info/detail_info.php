<div class="post">
    <div class="user-block">
    <span class="username">
        <a href="#"><?php echo $dataInfo->informasi ?></a>
    </span>
    <span class="description"><?php echo $dataInfo->nama_panitia .' - '. date("d M Y", strtotime($dataInfo->waktu))?></span>
    </div>
    <!-- /.user-block -->
    <p>
    <?php echo $dataInfo->keterangan ?>
    </p>

    <p>
</div>