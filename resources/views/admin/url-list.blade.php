@extends('admin.layouts.main')
@section('title', 'Short Links Manager')
@section('content')
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    List
                </div>
                <h2 class="page-title">
                Short Links Manager
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="javascript:void(0);" class="btn btn-danger delete-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"
                                                                                      fill="none"/><line x1="4" y1="7"
                                                                                                         x2="20"
                                                                                                         y2="7"/><line
                                    x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/><path
                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/><path
                                    d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg>
                            Empty
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                        <tr>
                            <th class="row">
                                No.
                            </th>
                            <th>Source Link</th>
                            <th>Short Link</th>
                            <th>Created Time</th>
                            <th class="text-end">Operate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(blank($urls))
                            <tr>
                                <td colspan="5" class="text-center">
                                    Ops! No Resources!
                                </td>
                            </tr>
                        @else
                            @foreach($urls as $url)
                                <tr>
                                    <th>{{ $url->id }}</th>
                                    <td><a href="{{ $url->original_url }}"
                                           title="{{ $url->original_url }}">{{ str_limit($url->original_url,64) }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('short',[ 'code' => $url->short_code ]) }}">{{ route('short',[ 'code' => $url->short_code ]) }}</a>
                                    </td>
                                    <td>{{ $url->created_at }}</td>
                                    <td class="text-end" data-id="{{ $url->id  }}">
                                        <a href="javascript:void(0);" class="btn btn-danger delete">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $urls->links('admin.components.page') }}
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        $(function() {
            $('.delete').on('click', function(e) {
                let _id = $(this).parent().attr('data-id')
                Swal.fire({
                    title: 'Sure to delete?',
                    text: 'Unrecoverable after deletion!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Set',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.value) {
                        axios.post('/admin/url/delete/' + _id)
                            .then(function(response) {
                                let data = response.data
                                if (data.error === '') {
                                    Swal.fire({
                                        title: 'Operated successfully',
                                        text: 'Deleted successfully',
                                        icon: 'success',
                                    }).then(() => {
                                        window.location.reload()
                                    })
                                }
                            })
                            .catch(function(error) {
                                console.log(error)
                            })
                    }
                })

            })
            $('.delete-all').on('click', function(e) {
                Swal.fire({
                    title: 'Sure to empty?',
                    text: 'Unrecoverable after empty!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Set',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.value) {
                        axios.post('/admin/url/empty')
                            .then(function(response) {
                                let data = response.data
                                if (data.error === '') {
                                    Swal.fire({
                                        title: 'Operated successfully',
                                        text: 'Emptyed successfully',
                                        icon: 'success',
                                    }).then(() => {
                                        window.location.reload()
                                    })
                                }
                            })
                            .catch(function(error) {
                                console.log(error)
                            })
                    }
                })

            })
        })
    </script>
@endpush
