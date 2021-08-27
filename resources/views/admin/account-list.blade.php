@extends('admin.layouts.main')
@section('title', 'Account Manager')
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
                    Account Manager
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('install') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Bind Account
                    </a>
                    <a href="{{ route('install') }}" class="btn btn-primary d-sm-none btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </a>
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
                            <th>Type</th>
                            <th>Status</th>
                            <th>Last Update</th>
                            <th>Remark <span class="small">(Choose Display)</span></th>
                            <th class="text-end">Operate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(blank($accounts))
                            <tr>
                                <td colspan="6" class="text-center">
                                    Ops! No Resourse
                                </td>
                            </tr>
                        @else
                            @foreach($accounts as $account)
                                <tr>
                                    <th>{{ $account->id }}</th>
                                    <td>{{ $account->accountType }}
                                        @if((int)setting('primary_account') === $account->id)
                                            <span class="badge badge-primary">Main Account</span>
                                        @endif
                                    </td>
                                    <td>{!! $account->status ? '<span style="color:green">Normal</span>':'<span style="color:red">Disable</span>' !!}</td>
                                    <td>{{ $account->updated_at }}</td>
                                    <td>
                                        <label>
                                            <input type="text" class="remark form-control form-control-sm"
                                                   value="{{ $account->remark }}"
                                                   data-id="{{ $account->id }}">
                                        </label>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                                Operate
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" data-id="{{ $account->id }}">
                                                <a class="dropdown-item set_main"
                                                   href="javascript:void(0)">Set As Main Account</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('manage.query',['account_id' =>$account->id])  }}">Files Manager</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.account.config',['id' =>$account->id])  }}">Account Settings</a>
                                                <a class="dropdown-item view_account"
                                                   href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#viewAccount">Account Details</a>
                                                <a class="dropdown-item view_drive"
                                                   href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#viewDrive">Drive Details</a>
                                                <a class="dropdown-item text-danger delete_account"
                                                   href="javascript:void(0)">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $accounts->links('admin.components.page') }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="viewDrive" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Drive Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label" for="state">state </label>
                        <input type="text" class="form-control" id="state" name="state"
                               value="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="total">total </label>
                        <input type="text" class="form-control" id="total" name="total"
                               value="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="used">used </label>
                        <input type="text" class="form-control" id="used" name="used"
                               value="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="remaining">remaining </label>
                        <input type="text" class="form-control" id="remaining" name="remaining"
                               value="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="deleted">deleted </label>
                        <input type="text" class="form-control" id="deleted" name="deleted"
                               value="" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Set</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="viewAccount" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label" for="id">id </label>
                        <input type="text" class="form-control" id="id" name="id"
                               value="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="displayName">displayName </label>
                        <input type="text" class="form-control" id="displayName" name="displayName"
                               value="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="userPrincipalName">userPrincipalName </label>
                        <input type="text" class="form-control" id="userPrincipalName" name="userPrincipalName"
                               value="" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Set</button>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        function readablizeBytes(bytes) {
            if (!bytes) return 0
            let s = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB']
            let e = Math.floor(Math.log(bytes) / Math.log(1024))
            return (bytes / Math.pow(1024, Math.floor(e))).toFixed(2) + ' ' + s[e]
        }

        $(function() {
            $('.table-responsive').on('show.bs.dropdown', function() {
                $(this).css('overflow', 'inherit')
            })

            $('.table-responsive').on('hide.bs.dropdown', function() {
                $(this).css('overflow', 'auto')
            })
            $('.view_account').on('click', function(e) {
                $('.loading').show()
                $('.account').hide()
                let account_id = $(this).parent().attr('data-id')
                axios.get('/admin/account/drive/' + account_id)
                    .then(function(response) {
                        let data = response.data.data
                        $('#id').val(data.id)
                        $('#displayName').val(data.displayName)
                        $('#userPrincipalName').val(data.userPrincipalName)
                        setTimeout(function() {
                            $('.loading').hide()
                            $('.account').show()
                        }, 1000)
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
                    .then(function() {
                        // always executed
                    })
            })
            $('.view_drive').on('click', function(e) {
                $('.loading').show()
                $('.drive').hide()
                let account_id = $(this).parent().attr('data-id')
                axios.get('/admin/account/' + account_id)
                    .then(function(response) {
                        let data = response.data.data
                        $('#total').val(readablizeBytes(data.quota.total))
                        $('#deleted').val(readablizeBytes(data.quota.deleted))
                        $('#used').val(readablizeBytes(data.quota.used))
                        $('#remaining').val(readablizeBytes(data.quota.remaining))
                        $('#state').val(data.quota.state)

                        setTimeout(function() {
                            $('.loading').hide()
                            $('.drive').show()
                        }, 1000)

                    })
                    .catch(function(error) {
                        console.log(error)
                    })
                    .then(function() {
                        // always executed
                    })
            })
            $('.delete_account').on('click', function(e) {
                let account_id = $(this).parent().attr('data-id')
                Swal.fire({
                    title: 'Sure to delete??',
                    text: 'Unrecoverable after deletion!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Set',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.value) {
                        axios.post('/admin/account/delete/' + account_id)
                            .then(function(response) {
                                let data = response.data
                                if (data.error === '') {
                                    Swal.fire({
                                        title: 'Successful operation',
                                        text: 'Delete account successfully',
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
            $('.remark').on('change', function(e) {
                let account_id = $(this).attr('data-id')
                let remark = $(this).val()
                axios.post('/admin/account/remark/' + account_id, {
                    remark: remark,
                })
                    .then(function(response) {
                        console.log(response)
                        window.location.reload()
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            })
            $('.set_main').on('click', function(e) {
                let account_id = $(this).parent().attr('data-id')
                axios.post('/admin/account/set-main', {
                    id: account_id,
                })
                    .then(function(response) {
                        let data = response.data
                        if (data.error === '') {
                            Swal.fire({
                                title: 'Successful operation',
                                text: 'Set up main account successfully',
                                icon: 'success',
                            }).then(() => {
                                window.location.reload()
                            })
                        }
                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            })
        })
    </script>
@endpush
