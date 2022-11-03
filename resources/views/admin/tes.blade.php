@extends('layouts.app')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Manage Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formData">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                placeholder="Title Post">
                            <span class="text-danger error-text title_error" style="font-size: 13px"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Post Content</label>
                            <textarea name="post_content" value="{{ old('post_content') }}" class="form-control" placeholder="Post Content"></textarea>
                            <span class="text-danger error-text post_content_error" style="font-size: 13px"></span>
                        </div>
                        <button type="submit" id="btn-create" class="btn btn-success btn-block">Save Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <h4 class="text-center mt-4">Laravel AJAX CRUD Real Time</h4>
        <div class="card mt-5">
            <div class="card-header">
                <h5>Data Post</h5>
            </div>
            <div class="card-body">
                <button id="openModal" data-action="{{ route('post.store') }}" class="btn btn-success mb-3">+ Create
                    Post</button>
                <div class="table-responsive">
                    <table class="table table-striped table-inverse table-responsive d-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('addon-script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('/js/crud.js') }}"></script>
@endpush

<script>
    showPosts();
    // table row with ajax
    function table_post_row(res) {
        let htmlView = '';
        if (res.posts.length <= 0) {
            htmlView += `
        <tr>
          <td colspan="4">No data.</td>
         </tr>`;
        }
        for (let i = 0; i < res.posts.length; i++) {
            htmlView += `
          <tr>
             <td>` + (i + 1) + `</td>
             <td>` + res.posts[i].title + `</td>
              <td>` + res.posts[i].post_content + `</td>
              <td>
                <button id="editModal" data-action="` + baseUrl + `/post/` + res.posts[i].id + `/update" data-id="` +
                res.posts[i].id + `" class="btn btn-warning btn-sm">Edit</button>
<button id="btn-delete" data-id="` + res.posts[i].id + `" class="btn btn-danger btn-sm">Delete</button>
</td>
</tr>
`;
        }
        $('#tbody').html(htmlView);
    }

    function showPosts() {
        $.ajax({
            type: 'GET',
            dataType: "json",
            url: baseUrl + '/post',
            success: function(res) {
                table_post_row(res);
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>
<script>
    $('button#openModal').click(function() {
        let url = $(this).data('action');
        $('#exampleModal').modal('show');
        $('#formData').trigger("reset");
        $('#formData').attr('action', url);
    })
    // Event for created and updated posts
    $('#formData').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
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
                    $('#formData').trigger("reset");
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
        $('#formData').attr('action', dataAction);
        $.ajax({
            type: 'GET',
            url: baseUrl + `/post/${id}/edit`,
            dataType: "json",
            success: function(res) {
                $('input[name=title]').val(res.post.title);
                $('textarea[name=post_content]').val(res.post.post_content);
                $('#exampleModal').modal('show');
                console.log(res);
            },
            error: function(error) {
                console.log(error)
            }
        })
    })
</script>
