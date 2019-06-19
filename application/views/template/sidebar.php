<aside class="main-sidebar elevation-4 sidebar-light-primary">
			<!-- Brand Logo -->
			<a href="welcome" class="brand-link bg-primary">
				<img src="<?php echo base_url()."assets/login/logo.png"; ?>" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
				<span class="brand-text font-weight-light">PKKMB</span>
			</a>

			<!-- Sidebar admin -->
			<div class="sidebar">
				<!--///////////////////// tampilan wadir//////////////////// -->
				<?php if($_SESSION['jabatan']=='wadir'){ ?>
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="<?php echo base_url()."assets/"; ?>dist/img/ic_admin.png" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<div style="font-family:verdana; class="d-block"><?php  echo ucwords($_SESSION['nama'])  ?></div>
						</div>
					</div>
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item has-treeview ">
							<a href=" <?php echo base_url()?>welcome" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
								Beranda
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>wadir/rating_maba" class="nav-link">
								<i class="nav-icon fa fa-chart-line"></i>
								<p>
								Rating Camaba
								</p>
							</a>
						</li>
						
					</ul>
				</nav>

					<!-- ////////////// tampilan siswa//////////////// -->
				<?php }elseif($_SESSION['jabatan']=='siswa'){ ?>
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="<?php echo base_url()."assets/foto_camaba/".$_SESSION['foto']; ?>" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<div style="font-family:verdana; class="d-block"><?php  echo ucwords($_SESSION['nama'])  ?></div>
						</div>
					</div>
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item has-treeview ">
							<a href=" <?php echo base_url('camaba/')?>welcome" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
								Beranda
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url("camaba/data_camaba/detailCamaba/").$_SESSION['id']?>" class="nav-link">
								<i class="nav-icon fas fa-user-friends"></i>
								<p>
								Data Camaba
								</p>
							</a>
						</li>
						<li class="nav-item">
									<a href="<?php echo site_url('camaba/data_presensi/detail_presensiMaba/').$_SESSION['id'] ?>" class="nav-link">
									<i class="nav-icon fas fa-user-friends"></i>
										<p>Data Presensi</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="<?php echo site_url('camaba/penilaian_kelengkapan/detail_penilaianKelengkapan/').$_SESSION['id']  ?>" class="nav-link ">
									<i class="nav-icon fas fa-user-friends"></i>
										<p>Data Kelengkapan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?php echo site_url('camaba/penilaian_keaktifan/detail_penilaianKeaktifan/').$_SESSION['id']  ?>" class="nav-link ">
									<i class="nav-icon fas fa-user-friends"></i>
										<p>Data Keaktifan</p>
									</a>
								</li>
						
					</ul>
				</nav>

				<!-- /////////////////////////////admin///////////////////////////// -->
					<?php }else if($_SESSION['jabatan']=='admin'){ ?>
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="<?php echo base_url()."assets/"; ?>dist/img/ic_admin.png" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<div style="font-family:verdana; class="d-block"><?php  echo ucwords($_SESSION['nama'])  ?></div>
						</div>
					</div>
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->
						<li class="nav-item has-treeview ">
							<a href=" <?php echo base_url()?>welcome" class="nav-link">
								<i class="nav-icon fas fa-home"></i>
								<p>
								Beranda
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href=" <?php echo base_url()?>user" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
								Data User
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>data_camaba" class="nav-link">
								<i class="nav-icon fas fa-user-friends"></i>
								<p>
								Data Camaba
								<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<?php 
							$CI =& get_instance();
							$CI->load->model('Prodi_model');
							$prodi = $CI->Prodi_model->read();

							foreach ($prodi as $key) { ?>
								<ul class="nav nav-treeview">
									<li class="nav-item">
									<a href="<?php echo site_url('data_camaba/read_mabaProdi/'.$key->id_prodi) ?>" class="nav-link active">
									<i class="nav-icon far fa-circle"></i>
										<p><?php echo ucwords($key->prodi) ?></p>
									</a>
								</ul>
							<?php }
							?>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>rating_maba" class="nav-link">
								<i class="nav-icon fa fa-chart-line"></i>
								<p>
								Rating Camaba
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview ">
							<a href="<?php echo base_url()?>transaksi/listPembelian" class="nav-link">
								<i class="nav-icon fa fa-table"></i>
								<p>
								Penilaian
								<i class="right fa fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo site_url('data_presensi') ?>" class="nav-link active">
									<i class="far fa-circle"></i>
										<p>Data Presensi</p>
									</a>
								</li>
								
								<li class="nav-item">
									<a href="<?php echo site_url('penilaian_kelengkapan') ?>" class="nav-link active">
									<i class="far fa-circle"></i>
										<p>Data Kelengkapan</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?php echo site_url('penilaian_keaktifan') ?>" class="nav-link active">
									<i class="far fa-circle"></i>
										<p>Data Keaktifan</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>data_prodi" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
								<p>
								Data Prodi
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>data_atribut" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
								<p>
								Data Kelengkapan
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>data_keaktifan" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
								<p>
								Data Keaktifan
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>data_pleton" class="nav-link">
								<i class="nav-icon fa fa-table"></i>
								<p>
								Data Pleton
								</p>
							</a>
						</li>
						
						<!-- <li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>artikel" class="nav-link">
								<i class="nav-icon fa fa-th"></i>
								<p>
								Data Camaba Terbaik
								</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="<?php echo base_url()?>artikel" class="nav-link">
								<i class="nav-icon fa fa-th"></i>
								<p>
								Cetak Laporan
								</p>
							</a>
						</li> -->
					</ul>
				</nav>
				<?php }
					?>
				<!-- /.sidebar-menu -->
			</div>

			<div class="sidebar">
				
			</div>
			<!-- /.sidebar -->
		</aside>