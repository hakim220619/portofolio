<?php $__env->startSection('content-header', 'Customer List'); ?>
<?php $__env->startSection('content-actions'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-md-12">
        <div class="page-header">
            <h4 class="page-title"><?php echo e($title); ?></h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard">Master Data</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="/TahunAjaran"><?php echo e($title); ?></a>
                </li>
            </ul>
        </div>
        <div class="card">

            <div class="card-header">
                <div class="d-flex align-items-center">

                    <a href="#" class="btn btn-primary btn-round ml-auto text-white" data-toggle="modal"
                        data-target="#add-kelas">
                        <i class="fa fa-plus"></i>
                        New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td style="width: 50%"><?php echo e($a->tahun); ?></td>
                                    <td style="width: 20%"><?php echo e($a->status); ?></td>
                                    <td><button data-target="#edit-kelas<?= $a->id ?>" type="button" data-toggle="modal"
                                            title="Edit Data" class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button data-id="<?php echo e($a->id); ?>" data-name="<?php echo e($a->tahun); ?>"
                                            onclick="getdeleteid(this)" type="button" data-toggle="modal"
                                            title="Delete Data" class="btn btn-link btn-danger btn-lg "
                                            data-original-title="Delete Task">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit-kelas<?= $a->id ?>" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                        Edit</span>
                                                    <span class="fw-light">
                                                        Tahun Ajaran
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/proses_edit_tahun/<?php echo e($a->id); ?>" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="" selected>Pilih Status
                                                                    </option>
                                                                    <?php $__currentLoopData = $tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            value="<?php echo e($ab); ?>"<?php echo e($ab == $a->status ? 'selected' : ''); ?>>
                                                                            <?php echo e($ab); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                        <button type="reset" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade " id="add-kelas" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                    Tambah</span>
                                <span class="fw-light">
                                    Tahun Ajaran
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/proses_add_tahun" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Tahun Ajaran</label>
                                            <select name="tahun" id="tahun" class="form-control">
                                                <option selected="selected">
                                                    Pilih Tahun
                                                </option>
                                                <?php
                                                    $yr = date('Y', strtotime('+1 years'));
                                                    $yrnkt = date('Y', strtotime('+1 years'));
                                                ?>
                                                <?php for($year = date('Y'); $year <= $yr; $year++): ?>
                                                    {
                                                    <option value="<?php echo e($year); ?>/<?php echo e($yrnkt); ?>">
                                                        <?php echo e($year); ?>/<?php echo e($yrnkt++); ?>

                                                    </option>
                                                    }
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="" selected>Pilih Status</option>
                                                <option value="ON">Aktif</option>
                                                <option value="OFF">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            function getdeleteid(e) {
                let id = e.getAttribute('data-id');
                let name = e.getAttribute('data-name');

                // console.log(name);
                swal({
                        title: "Are you sure?",
                        text: "apakah kamu menghapus data dengan nama Kelas! " + name + " ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {

                        if (willDelete) {
                            $.ajax({
                                url: "<?php echo e(route('kelas.delete')); ?>",
                                datatype: "json",
                                method: "POST",
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                    id: id
                                }
                            });
                            swal("Berhasil! data telah dihapus!", {
                                icon: "success",
                            });
                            location.reload();
                            return false;
                        } else {
                            swal("data tidak jadi dihapus!");
                        }
                    });
            };
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro/Documents/data/project/spp/resources/views/tahun_ajaran/index.blade.php ENDPATH**/ ?>