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
                <a href="/Kelas">{{ $title }}</a>
            </li>
        </ul>
    </div>
    <div class="card">

        <div class="card-header">
            <div class="d-flex align-items-center">
                <button id="openModal" data-action="proses_add_category"
                    class="btn btn-primary btn-round ml-auto text-white">New</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatables" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Create At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Add</span>
                            <span class="fw-light">
                                {{ $title }}
                            </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formData">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label for="">Category</label>
                                        <input type="text" name="name_category" value="{{ old('name_category') }}"
                                            class="form-control" placeholder="Category">
                                        <span class="text-danger error-text name_category_error"
                                            style="font-size: 13px"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer no-bd">
                                <button type="submit" id="btn-create" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

    </script>
    <script>
        $(document).ready(function() {
                showCategory();

                function showCategory() {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('LoadData') }}',
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            var no = 1;
                            var symbol =
                                '<i style="color: red; margin-left: -40px" class="fas fa-trash"></i>'
                            for (i = 0; i < data.length; i++) {
                                html += '<tr>' +
                                    '<td>' + no++ + '</td>' +
                                    '<td>' + data[i].name_category + '</td>' +
                                    '<td>' + data[i].created_at + '</td>' +
                                    '<td>'+
                                        '<button id="editModal" data-action="/CategoryEdit/' + data[i].id +'" data-id="' + data[i].id + '" class="btn btn-warning btn-sm btn-round">Edit</button> <button id="btn-delete" data-id="'+ data[i].id + '" data-name="'+data[i].name_category+'"onclick="getdeleteid(this)" class="btn btn-danger btn-sm btn-round">Delete</button>' +'</td>' +
                                '</tr>';
                            }
                            $('#show_data').html(html);
                        }
                    });
                }
            })
    </script>


    <script>
        function getdeleteid(e) {
                let id = e.getAttribute('data-id');
                let name = e.getAttribute('data-name');
                console.log(id);
                swal({
                        title: "Are you sure?",
                        text: "apakah kamu menghapus data! " + name + " ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {

                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('Category.DeleteCategory') }}",
                                datatype: "json",
                                method: "POST",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    id: id
                                }
                            });
                            swal("Category Deleted Successfully", {
                                icon: "success",
                            });
                            $(document).ready(function(){
                            showCategory();
                            });
                        } else {
                            swal("Category is not deleted!");
                        }
                    });
            };
    </script>
    <script>
        $('button#openModal').click(function() {
            let url = $(this).data('action');
            $('#exampleModal').modal('show');
            $('#formData').trigger("reset");
            $('#formData').attr('action', url);
        })
        $('.close').click(function() {
            $('#exampleModal').modal('toggle');
        });
        // Event for created and updated posts
        $('#formData').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let cek = $(this).attr('action');
            console.log(cek);
            $.ajax({
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                url: $(this).attr('action'),
                
                beforeSend: function() {
                    $('#btn-create').addClass("disabled").html("Processing...").attr('disabled', true);
                    $(document).find('span.error-text').text('');
                },
                complete: function() {
                    $('#btn-create').removeClass("disabled").html("Save   Change").attr('disabled',
                        false);
                },
                success: function(res) {
                    console.log(res);
                    if (res.success == true) {
                        showCategory();
                        $('#exampleModal').modal('hide');
                        showPosts(); // call function show Posts
                        Swal.fire(
                            'Success!',
                            res.message,
                            'success'
                        )
                    }
                },
                error(err) {
                    $.each(err.responseJSON, function(prefix, val) {
                        $('.' + prefix + '_error').text(val[0]);
                    })
                    console.log(err);
                }
            })
        })
        //open edit modal
        $(document).on('click', 'button#editModal', function() {
            let id = $(this).data('id');
            let dataAction = $(this).data('action');
            console.log(dataAction);
            $('#formData').attr('action', dataAction);
            $.ajax({
                type: 'GET',
                url: dataAction,
                dataType: "json",
                success: function(res) {
                    $('input[name=name_category]').val(res.data.name_category);
                    $('#exampleModal').modal('show');
                    console.log(res);
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
    </script>
    @endsection