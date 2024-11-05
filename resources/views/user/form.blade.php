@extends('layouts.master')

@section('title') {{ empty($user) ? 'User | Create' : 'User | Edit' }} @endsection

@section('css')
<style>
    label[for="avatar"] {
        width: 100% !important;
        height: 160px !important;
        border: 2.5px dashed brown;
        overflow: hidden;
        padding: 12px;
        display: block;
        cursor: pointer;
    }

    label[for="avatar"] #preview-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@endsection

@section('content')
<div class="col-lg-9">
    <form action="{{ empty($user) ? route('user.store') : route('user.update', $user->id) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if(!empty($user)) @method('PATCH') @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p class="mb-0 px-2">
                    @empty($user) Create User Form @else Edit User Form @endempty
                </p>
            </div>

            <div class="card-body py-4">
                <div class="row g-3 p-2">
                    <div class="form-group col-lg-6 mb-2">
                        <label for="name" class="form-label">Username <b class="text-danger">*</b></label>
                        <input type="text" name="name" class="form-control" id="name"
                        value="{{ empty($user) ? old('name') : old('name', $user->name) }}">
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="name" class="form-label">Email Address <b class="text-danger">*</b></label>
                        <input type="text" name="email" class="form-control" id="email"
                        value="{{ empty($user) ? old('email') : old('email', $user->email) }}">
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="role" class="form-label">User Roles Name <b class="text-danger">*</b></label>
                        <select class="form-select rounded-0" name="role">
                            <option selected disabled> - Select Role - </option>
                            @foreach(['administrator', 'manager', 'user'] as $role)
                            <option value="{{ $role }}"
                            @if(empty($user) ? old('role') == $role : $role == $user->role)
                                selected
                            @endif>
                                &#10061; {{ ucwords(strtolower($role)) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="company_id" class="form-label">Company Name <b class="text-danger">*</b></label>
                        <select class="form-select rounded-0" name="company_id">
                            <option selected disabled> - Select Company - </option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}"
                            @if(empty($user) ? old('company_id') == $company->id : $company->id == $user->company_id)
                                selected
                            @endif
                            >
                                &#10061; {{ $company->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="phone" class="form-label">Phone <b class="text-danger">*</b></label>
                        <input type="text" name="phone" class="form-control" id="phone"
                        value="{{ empty($user) ? old('phone') : old('name', $user->phone) }}">
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="password" class="form-label">Password <b class="text-danger">*</b></label>
                        <input type="password" name="password" class="form-control" id="password"
                        placeholder="* * * * * * * *" autocomplete="new-password">
                    </div>

                    <div class="form-group col-lg-12 mb-2">
                        <div class="mb-3">
                            <p class="mb-2">Avatar</p>
                            <label for="avatar" class="mb-3">
                                @php
                                $src = empty($user) || empty($user->avatar)
                                       ? asset("img/img_placeholder_avatar.jpg")
                                       : asset("storage/avatar/thumbnail/$user->avatar");
                                @endphp
                                <img src="{{ $src }}" id="preview-img">
                            </label>
                            <input type="file" name="avatar" class="form-control" id="avatar" onchange="previewImage(this);"
                            style="display: none;">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>

            <div class="card-footer">
                <div class="text-center">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-primary rounded-0">
                        <span class="material-symbols-outlined me-1">
                            west
                        </span>
                        B A C K
                    </a>
                    <button type="submit" class="btn btn-primary rounded-0">
                        @if(empty($user)) Create @else Update @endif
                        <span class="material-symbols-outlined ms-1">
                            east
                        </span>
                    </button>
                </div>
            </div>
        </div><!-- /.card -->
    </form>
</div>
@endsection

@section('js')
<script>
    function previewImage(input){
        let file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(){
                $("#preview-img").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
