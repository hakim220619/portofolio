<?php $__env->startSection('title', 'Customer List'); ?>
<?php $__env->startSection('content-header', 'Customer List'); ?>
<?php $__env->startSection('content-actions'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><?php echo e($title); ?></div>
            </div>
            <form class="student" method="post" action="/proses_edit_student/<?php echo e($student->id); ?>"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <!-- <input hidden type="number" class="form-control" id="id" name="id" placeholder="Masukan id"> -->
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="nis">Nis</label>
                                <input type="text" class="form-control"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    id="nis" name="nis" value="<?php echo e($student->nis); ?>" placeholder="Masukan nis"
                                    required>
                                <small id="nis" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="nisn">Nisn</label>
                                <input type="text" class="form-control"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    id="nisn" name="nisn" value="<?php echo e($student->nisn); ?>" placeholder="Masukan nisn"
                                    required>
                                <small id="nisn" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="full_name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    placeholder="Masukan Nama Lengkap" value="<?php echo e($student->full_name); ?>" required>
                                <small id="full_name" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan password">
                                <small id="password" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="nisn">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option selected>
                                        Pilih Jenis Kelamin
                                    </option>
                                    <?php $__currentLoopData = $gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ab); ?>" <?php echo e($ab == $student->gender ? 'selected' : ''); ?>>
                                            <?php if($ab == 'L'): ?>
                                                <p>Laki-Laki</p>
                                            <?php else: ?>
                                                <p>Perempuan</p>
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="born_date">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="born_date" name="born_date"
                                    value="<?php echo e($student->born_date); ?>" placeholder="Masukan Tanggal Lahir" required>
                                <small id="born_date" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="born_place">Tempat Lahir</label>
                                <input type="text" class="form-control" id="born_place" name="born_place"
                                    value="<?php echo e($student->born_place); ?>" placeholder="Masukan Tempat Lahir" required>
                                <small id="born_place" class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="phone">No Tlp</label>
                                <input type="text" class="form-control"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    id="phone" name="phone" value="<?php echo e($student->phone); ?>" placeholder="Masukan phone"
                                    required>
                                <small id="phone" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="hobby">Hobby</label>
                                <input type="text" class="form-control" id="hobby" name="hobby"
                                    value="<?php echo e($student->hobby); ?>" placeholder="Masukan Hobby" required>
                                <small id="hobby" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="tahun_masuk">Tahun Masuk</label>
                                <select name="tahun_masuk" id="tahun_masuk" class="form-control">
                                    <option value="" selected>Pilih Tahun</option>
                                    <?php
                                        $yr = date('Y', strtotime('+1 years'));
                                        
                                    ?>
                                    <?php for($year = date('Y'); $year <= $yr; $year++): ?>
                                        {
                                        <option value="<?php echo e($year); ?>"
                                            <?php echo e($year == $student->tahun_masuk ? 'selected' : ''); ?>>
                                            <?php echo e($year); ?>

                                        </option>
                                        }
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control" id="angkatan" name="angkatan"
                                    placeholder="Masukan angkatan" value="<?php echo e($student->angkatan); ?>" required>
                                <small id="angkatan" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="name_of_father">Ayah</label>
                                <input type="text" class="form-control" id="name_of_father" name="name_of_father"
                                    value="<?php echo e($student->name_of_father); ?>" placeholder="Masukan Nama Ayah" required>
                                <small id="name_of_father" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="name_of_mother">Ibu</label>
                                <input type="text" class="form-control" id="name_of_mother" name="name_of_mother"
                                    value="<?php echo e($student->name_of_mother); ?>" placeholder="Masukan Nama Ibu" required>
                                <small id="name_of_mother" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="class_id">Kelas</label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option selected="selected">
                                        Pilih Kelas
                                    </option>
                                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ab->id); ?>"
                                            <?php echo e($ab->id == $student->class_id ? 'selected' : ''); ?>>
                                            <?php echo e($ab->class_name); ?> - <?php echo e($ab->ket); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="image">FOTO</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="Masukan Foto">
                                <img style="height: 70px" src="<?php echo e(asset('images/student/' . $student->img . '')); ?>"
                                    alt="">
                                <small id="image" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea name="address" class="form-control" id="address" cols="135" rows="2"><?php echo e($student->address); ?>"</textarea>
                                <small id="address" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/siswa" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro/Documents/data/project/spp/resources/views/student/edit_student.blade.php ENDPATH**/ ?>