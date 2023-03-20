@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row justify-content-end">
                <div style="width:fit-content;" class="py-1">
                    <button type="button" class="btn btn-success createUser" >
                        Create User
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Email Verified At</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item)
                            <tr class="item{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->email_verified_at}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><button class="edit-modal btn btn-info" 
                                        data-info="{{$item->id}},{{$item->name}},{{$item->email}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>
                                    <button class="delete-modal btn btn-danger"
                                        data-info="{{$item->id}},{{$item->name}},{{$item->email}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="modal-close close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="p-2">
                <div class="row">
                    <div class="col-2">
                        <span><b>Id</b></span>
                    </div>
                    <div class="col-10">
                        <input id="fid" disabled type="text" value="" />
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-2">
                        <span><b>Name</b></span>
                    </div>
                    <div class="col-10">
                        <input id="name" type="text" value="" />
                        <span class="text-danger name-error d-none">The Name is required.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <span><b>Email</b></span>
                    </div>
                    <div class="col-10">
                        <input id="email" type="text" value="" />
                        <span class="text-danger email-error d-none">The Email is required.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-close btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="edit btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
<div class="modal fade hide" id="myCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
            <button type="button" class="modal1-close close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="p-2">
                <!-- <div class="row">
                    <div class="col-2">
                        <span><b>Id</b></span>
                    </div>
                    <div class="col-10">
                        <input id="fid" disabled type="text" value="" />
                    </div>
                </div> -->
                <div class="row py-2">
                    <div class="col-4">
                        <span><b>Name</b></span>
                    </div>
                    <div class="col-8">
                        <input id="cname" type="text" value="" />
                        <br>
                        <span class="text-danger cname-error d-none">The Name is required.</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-4">
                        <span><b>Email</b></span>
                    </div>
                    <div class="col-8">
                        <input id="cemail" type="email" value="" />
                        <br>
                        <span class="text-danger cemail-error d-none">The Email is required.</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-4">
                        <span><b>Password</b></span>
                    </div>
                    <div class="col-8">
                        <input id="cpassword" type="password" value="" autocomplete="new-password" />
                        <br>
                        <span class="text-danger cpassword-error d-none">The password is required.</span>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-4">
                        <span><b>Confirm Password</b></span>
                    </div>
                    <div class="col-8">
                        <input id="cconfirm" type="password" value="" autocomplete="new-password" />
                        <br>
                        <span class="text-danger cconfirm-error d-none">The Password should match.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal1-close btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="create btn btn-primary">Save</button>
        </div>
        </div>
    </div>
</div>
<div class="modal fade hide" id="myDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
            <button type="button" class="modal2-close close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="p-2">
                <div class="row">
                    <div class="col-10">
                        <span>Are you sure, You want to delete <b><span class="dname"></span></b></span>
                    </div>
                </div>
                <input class="did" hidden type="text" value="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="modal2-close btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="delete btn btn-danger">Delete</button>
        </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#table').DataTable();

        $(document).on('click', '.edit-modal', function() {
            var stuff = $(this).data('info').split(',');
            fillmodalData(stuff)
            $('.name-error').addClass('d-none');
            $('.email-error').addClass('d-none');
            $('#myModal').modal('show');
        });
        $(document).on('click', '.createUser', function() {
            $('#myCreateModal').modal('show');
        });
        $(document).on('click', '.modal-close', function() {
            $('#myModal').modal('hide');
        });
        $(document).on('click', '.modal2-close', function() {
            $('#myDeleteModal').modal('hide');
        });
        $(document).on('click', '.modal1-close', function() {
            $('#myCreateModal').modal('hide');
        });
        
        $(document).on('click', '.delete-modal', function() {
            var stuff = $(this).data('info').split(',');
            $('.did').val(stuff[0]);
            $('.dname').html(stuff[1]);
            $('#myDeleteModal').modal('show');
        });

        
    function fillmodalData(details){
        console.log(details);
        $('#fid').val(details[0]);
        $('#name').val(details[1]);
        $('#email').val(details[2]);
    }
    $('.modal-footer').on('click', '.create', function() {
        var id = $("#fid").val();
        var error = false;
        if(!$('#cname').val()){
            $('.cname-error').removeClass('d-none');
            error = true;
        } else{
            $('.cname-error').addClass('d-none');
        }
        if(!$('#cemail').val()){
            $('.cemail-error').removeClass('d-none');
            error = true;
        } else{
            $('.cemail-error').addClass('d-none');
        }
        if(!$('#cpassword').val()){
            $('.cpassword-error').removeClass('d-none');
            error = true;
        } else{
            $('.cpassword-error').addClass('d-none');
        }
        if(!$('#cconfirm').val()){
            $('.cconfirm-error').removeClass('d-none');
            error = true;
        } else{
            $('.cconfirm-error').addClass('d-none');
        }
        if(!error){
            $.ajax({
                type: 'post',
                url: '/user',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'name': $('#cname').val(),
                    'email': $('#cemail').val(),
                    'password': $('#cpassword').val()
                },
                success: function(data) {
                    $('#myCreateModal').modal('hide');
                    $('div.flash-message').html(data);
                    setTimeout(function(){
                        $("div.alert").remove();
                        location.reload(true);
                    }, 2000 );
                }
            });
        }
        });
    
    $('.modal-footer').on('click', '.edit', function() {
        var id = $("#fid").val();
        var error = false;
        if(!$('#name').val()){
            $('.name-error').removeClass('d-none');
            error = true;
        }

        if(!$('#email').val()){
            $('.email-error').removeClass('d-none');
            error = true;
        }
        if(!error){
            $.ajax({
                type: 'put',
                url: '/user/'+ id,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                },
                success: function(data) {
                    $('#myModal').modal('hide');
                    $('div.flash-message').html(data);
                    setTimeout(function(){
                        $("div.alert").remove();
                        location.reload(true);
                    }, 2000 );
                }
            });
        }
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'delete',
                url: '/user/'+$('.did').val(),
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': $('.did').val()
                },
                success: function(data) {
                    $('#myDeleteModal').modal('hide');
                    $('.item' + $('.did').val()).remove();
                    $('div.flash-message').html(data);
                    setTimeout(function(){
                        $("div.alert").remove();
                    }, 2000 );
                }
            });
        });
    } );
 </script>
@stop
