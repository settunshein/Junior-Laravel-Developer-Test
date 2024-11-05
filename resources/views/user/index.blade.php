@extends('layouts.master')

@section('title', 'Company | List')

@section('content')
<div class="col-lg-9">
    <div class="card rounded-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p class="mb-0">User List Table</p>
            <a href="{{ route('user.create') }}" class="btn btn-primary rounded-0">
                Create
                <span class="material-symbols-outlined ms-1">
                    east
                </span>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered rounded-0">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th>Basic Info</th>
                        <th style="width: 20%;">Action</th>
                    </tr>
                </thead><!-- /thead -->

                <tbody>
                    @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{ $loop->index + 1 }}</td>

                        <td class="text-start p-3">
                            <div class="d-flex align-items-center px-3">
                                <div class="flex-shrink-0">
                                    <img src="{{ $user->getThumbnailImagePath() }}" class="rounded-circle"
                                    alt="{{ $user->name }}" style="width: 110px; border: 3px solid dodgerblue;">
                                </div>

                                <ul class="flex-grow-1 list-group ms-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                        <p class="mb-0">
                                            <span class="m-icon material-symbols-outlined">account_circle</span>
                                            {{ $user->name }}
                                        </p>
                                        <p class="mb-0">
                                            {{ optional($user->company)->name }}
                                            <span class="m-icon material-symbols-outlined">domain</span>
                                        </p>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                        <p class="mb-0">
                                            <span class="m-icon material-symbols-outlined">mail</span>
                                            {{ $user->email }}
                                        </p>
                                        <p class="mb-0">
                                            {{ $user->phone ?? ' - ' }}
                                            <span class="m-icon material-symbols-outlined">phone_iphone</span>
                                        </p>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                        <p class="mb-0 text-capitalize">
                                            <span class="m-icon material-symbols-outlined">work</span>
                                            {{ $user->role }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </td>

                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="action-btn btn btn-warning">
                                <span class="material-symbols-outlined">edit_square</span>
                            </a>

                            <form action="{{ route('user.destroy', $user->id) }}" class="deleteUserForm{{$user->id}} d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                                <a href="javascript:;" class="action-btn btn btn-danger del-user-btn" data-id="{{ $user->id }}">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody><!-- /.tbody -->
            </table>
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div>
@endsection

@section('js')
<script>
    $(document).on('click', '.del-user-btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: `Do You Want to Delete this User?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7066E0',
            cancelButtonColor: '#F82249',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('.deleteUserForm'+id).submit();
            }
        });
    })
</script>
@endsection
