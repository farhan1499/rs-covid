<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light shadow mb-5 bg-body rounded" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color: #4361ee; font-size: 13px;">Dashboard</div>
                            <a class="nav-link" href="<?= base_url(); ?>" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <div class="sb-sidenav-menu-heading" style="color: #4361ee; font-size: 13px;">Master</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <?php if(in_groups('admin')) : ?>
                                    <a class="nav-link" href="<?= base_url(); ?>/data/dokter" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Dokter</a>
                                    <a class="nav-link" href="<?= base_url(); ?>/data/perawat" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Perawat</a>
                                <?php endif; ?>
                                    <a class="nav-link" href="<?= base_url(); ?>/data/pasien" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Pasien</a>
                                </nav>
                            </div>

                            <?php if(in_groups('admin')) : ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Obat
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url(); ?>/data/obat" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Daftar Obat</a>
                                    <a class="nav-link" href="<?= base_url(); ?>/data/resep" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Daftar Resep</a>
                                </nav>
                            </div>  
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Periksa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url(); ?>/data/periksa" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Periksa</a>
                                    <a class="nav-link" href="<?= base_url(); ?>/data/rawat" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Rawat Inap</a>
                                    <a class="nav-link" href="<?= base_url(); ?>/data/rekam" style="margin-left: 25px; font-family: inherit; font-size: 14px;">Rekam Medis</a>
                                </nav>
                            </div>  
                            
                            <div class="sb-sidenav-menu-heading" style="color: #4361ee; font-size: 13px;">Forms</div>
                            <a class="nav-link" href="<?= base_url(); ?>/forms/pendaftaran" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Pendaftaran Pasien
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>/forms/periksa" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pemeriksaan
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>/forms/rawat" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pendaftaran Pasien Rawat Inap
                            </a>
                            <a class="nav-link" href="<?= base_url(); ?>/forms/rekam" style="margin-left: 15px; font-family: inherit; font-size: 14px;">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Rekam Medis
                            </a>
                            <?php endif; ?>

                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= ucfirst(user()->username); ?>
                    </div>
                </nav>
            </div>