<?php $__env->startSection('title', 'Customer List'); ?>
<?php $__env->startSection('content-header', 'Customer List'); ?>
<?php $__env->startSection('content-actions'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        @media (min-width:749px) {
            .right-button {
                margin-left: 78%;
            }
        }

        @media (max-width:800px) {
            .right-button {
                margin-left: 44%;
            }
        }

        @media (max-width:450px) {
            .right-button {
                margin-left: 25%;
            }
        }

        @media (max-width:360px) {
            .right-button {
                margin-left: 20%;
            }
        }

        @media (min-width:810px) {
            .right-button {
                margin-left: 67%;
            }
        }

        @media (min-width:800px) {
            .right-button {
                margin-left: 67%;
            }
        }

        @media (min-width:1100px) {
            .right-button {
                margin-left: 78%;
            }
        }
    </style>
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
                    <a href="/Siswa"><?php echo e($title); ?></a>
                </li>
            </ul>
        </div>
        <div class="card">

            <div class="card-header">
                <div class="d-flex align-items-center">

                    <div class="dropdown right-button">
                        <button class="btn btn-info btn-round dropdown-toggle" type="button" id="dropdownMenu2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><button class="dropdown-item" type="button" onclick="exportexcel()">Excel</button>
                            </li>
                            
                        </ul>
                    </div>

                    <a href="/add_student" class="btn btn-primary btn-round ml-auto text-white">
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
                                <th>Foto</th>
                                <th>Nis</th>
                                <th>Nisn</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><img style="height: 70px" src="<?php echo e(asset('images/student/' . $a->img . '')); ?>"
                                            alt="">
                                    </td>
                                    <td><?php echo e($a->nis); ?></td>
                                    <td><?php echo e($a->nisn); ?></td>
                                    <td><?php echo e($a->full_name); ?></td>
                                    <td><?php echo e($a->born_date); ?></td>
                                    <td><?php echo e($a->class_name); ?> - <?php echo e($a->ket); ?></td>
                                    <td style="width: 20%"><a href="/edit_student/<?php echo e($a->id); ?>" type="button"
                                            title="Edit Data" class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button data-nis="<?php echo e($a->nis); ?>" data-name="<?php echo e($a->full_name); ?>"
                                            onclick="getdeleteid(this)" type="button" data-toggle="modal"
                                            title="Delete Data" class="btn btn-link btn-danger btn-lg "
                                            data-original-title="Delete Task">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            function getdeleteid(e) {
                let nis = e.getAttribute('data-nis');
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
                                url: "<?php echo e(route('siswa.delete_siswa')); ?>",
                                datatype: "json",
                                method: "POST",
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                    nis: nis
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

            function exportexcel() {
                $.ajax({
                    url: '<?php echo e(route('siswa.download')); ?>',
                    type: "get",
                    success: function(data) {
                        alert("okay");
                    },
                });
            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro/Documents/data/project/spp/resources/views/student/index.blade.php ENDPATH**/ ?>