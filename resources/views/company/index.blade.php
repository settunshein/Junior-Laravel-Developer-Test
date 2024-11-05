@extends('layouts.master')

@section('title', 'Company | List')

@section('content')
<div class="col-lg-9">
    <div class="card rounded-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p class="mb-0">Company List Table</p>
            <a href="{{ route('company.create') }}" class="btn btn-primary rounded-0">
                Create
                <span class="material-symbols-outlined ms-1">east</span>
            </a>
        </div><!-- /.card-header -->

        <div class="card-body">
            <table class="table table-bordered rounded-0">
                <thead>
                    <tr>
                        <th style="width: 8%;">#</th>
                        <th style="width: 18%;">Logo</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td><img src="{{ $company->getThumbnailImagePath() }}" alt="{{ $company->name }}" style="width: 80px; border-radius: 8px;"></td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website ?? '404' }}</td>
                        <td>
                            <a href="{{ route('company.edit', $company->id) }}" class="action-btn btn btn-warning">
                                <span class="material-symbols-outlined">edit_square</span>
                            </a>

                            <form action="{{ route('company.destroy', $company->id) }}"
                            class="deleteCompanyForm{{$company->id}} d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                                <a href="javascript:;" class="action-btn btn btn-danger del-company-btn"
                                data-id="{{ $company->id }}">
                                    <span class="material-symbols-outlined">delete</span>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- /.card-body -->

        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $companies->links() }}
            </div>
        </div><!-- /.card-footer -->
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).on('click', '.del-company-btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: `Do You Want to Delete this Company?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#7066E0',
            cancelButtonColor: '#F82249',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('.deleteCompanyForm'+id).submit();
            }
        });
    })
</script>
@endsection
