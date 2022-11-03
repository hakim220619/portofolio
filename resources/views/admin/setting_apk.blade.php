@extends('layouts.adm')
@section('content-header', 'Customer List')
@section('content-actions')

@endsection
@section('css')

@endsection
@section('content')


    <div class="col-md-12">
        <div class="page-header">
            <h4 class="page-title">{{ $title }}</h4>
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
                    <a href="/Aplikasi">{{ $title }}</a>
                </li>
            </ul>
        </div>
        <div class="card">

            <div class="card-header">
                <div class="d-flex align-items-center">

                    <a href="#" class="btn btn-primary btn-round ml-auto text-white" data-toggle="modal"
                        data-target="#exampleModal">
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
                                <th>Nama Pemilik</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Title</th>
                                <th>Nama Aplikasi</th>
                                <th>Logo</th>
                                <th>Copy Right</th>
                                <th>Version</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $a)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $a->nama_owner }}</td>
                                    <td>{{ $a->alamat }}</td>
                                    <td>{{ $a->tlp }}</td>
                                    <td>{{ $a->title }}</td>
                                    <td>{{ $a->nama_aplikasi }}</td>
                                    <td><img style="height: 80px" src="{{ asset('images/aplikasi/' . $a->image . '') }}"
                                            alt="">
                                    </td>
                                    <td>{{ $a->copy_right }}</td>
                                    <td>{{ $a->version }}</td>
                                    <td><button data-target="#edit-apk<?= $a->id ?>" type="button" data-toggle="modal"
                                            title="Edit Data" class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task">
                                            <i class="fa fa-edit"></i>
                                        </button></td>
                                </tr>
                                <div class="modal fade bd-example-modal-lg" id="edit-apk<?= $a->id ?>" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header no-bd">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">
                                                        Edit</span>
                                                    <span class="fw-light">
                                                        Aplikasi
                                                    </span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/updateaplikasi/{{ $a->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input id="id" name="id" value="<?= $a->id ?>"
                                                        type="text" class="form-control" placeholder="fill name" hidden>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Owner</label>
                                                                <input id="nama_owner" name="nama_owner"
                                                                    value="<?= $a->nama_owner ?>" type="text"
                                                                    class="form-control @error('nama_owner')
is-invalid
@enderror"
                                                                    placeholder="fill name">
                                                                @error('nama_owner')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Alamat</label>
                                                                <input id="alamat" name="alamat"
                                                                    value="<?= $a->alamat ?>" type="text"
                                                                    class="form-control @error('alamat')
is-invalid
@enderror"
                                                                    placeholder="fill position">
                                                                @error('alamat')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Telpon</label>
                                                                <input id="tlp" name="tlp" value="<?= $a->tlp ?>"
                                                                    type="text"
                                                                    class="form-control @error('tlp')
is-invalid
@enderror"
                                                                    placeholder="fill office">
                                                                @error('tlp')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Title</label>
                                                                <input id="title" name="title"
                                                                    value="<?= $a->title ?>" type="text"
                                                                    class="form-control @error('title')
is-invalid
@enderror"
                                                                    placeholder="fill name">
                                                                @error('title')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Aplikasi</label>
                                                                <input id="nama_aplikasi" name="nama_aplikasi"
                                                                    value="<?= $a->nama_aplikasi ?>" type="text"
                                                                    class="form-control @error('nama_aplikasi')
is-invalid
@enderror"
                                                                    placeholder="fill position">
                                                                @error('nama_aplikasi')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group form-group-default">
                                                                <label>Versi</label>
                                                                <input id="version" name="version"
                                                                    value="<?= $a->version ?>" type="text"
                                                                    class="form-control @error('version')
is-invalid
@enderror"
                                                                    placeholder="fill position">
                                                                @error('versi')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Logo</label>
                                                                <input type="file"
                                                                    class="form-control @error('image') is-invalid @enderror"
                                                                    name="image" id="image" placeholder="Image"
                                                                    value="">
                                                                @error('image')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Copy Right</label>
                                                                <input id="copy_right" name="copy_right"
                                                                    value="<?= $a->copy_right ?>" type="text"
                                                                    class="form-control @error('copy_right')
is-invalid
@enderror"
                                                                    placeholder="fill name">
                                                                @error('copy_right')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" id="addRowButton"
                                                            class="btn btn-primary">Edit</button>
                                                        <button type="reset" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    @endsection
