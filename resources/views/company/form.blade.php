@extends('layouts.master')

@section('title') {{ empty($company) ? 'Company | Create' : 'Company | Edit' }} @endsection

@section('css')
<style>
    label[for="logo"] {
        width: 100% !important;
        height: 190px !important;
        border: 2.5px dashed brown;
        overflow: hidden;
        padding: 12px;
        display: block;
        cursor: pointer;
    }

    label[for="logo"] #preview-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@endsection

@section('content')
<div class="col-lg-9">
    <form action="{{ empty($company) ? route('company.store') : route('company.update', $company->id) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if(!empty($company)) @method('PATCH') @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <p class="mb-0 px-2 card-ttl">
                    @empty($company) Create Company Form @else Edit Company Form @endempty
                </p>
            </div>

            <div class="card-body py-4">
                <div class="row g-3 p-2">
                    <div class="col-7">
                        <div class="form-group col-12 mb-4">
                            <label for="name" class="form-label">Company Name <b class="text-danger">*</b></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            value="{{ empty($company) ? old('name') : old('name', $company->name) }}">
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group col-12 mb-4">
                            <label for="email" class="form-label">Email Address <b class="text-danger">*</b></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            value="{{ empty($company) ? old('email') : old('email', $company->email) }}">
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group col-12 mb-4">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" id="website"
                            value="{{ empty($company) ? old('website') : old('website', $company->website) }}">
                            <small class="text-danger">{{ $errors->first('website') }}</small>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="mb-3">
                            <p class="mb-2">Company Logo</p>
                            <label for="logo" class="mb-3">
                                @php
                                $src = empty($company) || empty($company->logo)
                                       ? asset("img/img_placeholder_logo.jpg")
                                       : asset("storage/logo/thumbnail/$company->logo");
                                @endphp
                                <img src="{{ $src }}" id="preview-img">
                            </label>
                            <input type="file" name="logo" class="form-control d-none" id="logo" onchange="previewImage(this);">
                        </div>
                        <small class="text-danger">{{ $errors->first('logo') }}</small>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="text-center">
                    <a href="{{ route('company.index') }}" class="btn btn-outline-primary rounded-0">
                        <span class="material-symbols-outlined me-1">
                            west
                        </span>
                        B A C K
                    </a>
                    <button type="submit" class="btn btn-primary rounded-0">
                        @if(empty($company)) Create @else Update @endif
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
