<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>

                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="<?php echo e(route('dashboard')); ?>" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Master Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(route('TahunAjaran.tahun')); ?>">
                                    <span class="sub-item">Tahun Ajaran</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('Kelas')); ?>">
                                    <span class="sub-item">Kelas</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('Siswa')); ?>">
                                    <span class="sub-item">Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('Sekolah')); ?>">
                                    <span class="sub-item">Sekolah</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('Aplikasi')); ?>">
                                    <span class="sub-item">Aplikasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pembayaran">
                        <i class="fa fa-credit-card"></i>
                        <p>Pembayaran</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pembayaran">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(route('pembayaran')); ?>">
                                    <span class="sub-item">Detail Pembayaran</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pengaturan">
                        <i class="fa fa-cog"></i>
                        <p>Pengaturan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pengaturan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Kelas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<?php /**PATH /Users/macbookpro/Documents/data/project/spp/resources/views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>