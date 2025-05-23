@extends('layouts.app')
@section('title', 'Dashboard - Siakad')
@section('title-content', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Permissions</h3>
                </div>
                <div class="card-body">
                    <form id="formPermissions">
                        <div class="form-group">
                            <label for="">Name Permissions</label>
                            <input type="text" class="form-control" id="valName" placeholder="Entry name permissions"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" id="SubmitBtn" class="btn btn-sm btn-primary btn-space mb-0">Tambah
                                Data</button>
                            <div id="loadingSpinner" class="d-none btn btn-sm btn-danger btn-space mb-0">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Proses Tambah...
                            </div>
                        </div>
                    </form>
                    <script>
                        document.getElementById('formPermissions').addEventListener('submit', function(e) {
                            e.preventDefault();

                            const valName = document.getElementById('valName').value;
                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            document.getElementById('SubmitBtn').classList.add('d-none');
                            document.getElementById('loadingSpinner').classList.remove('d-none');

                            axios.post('{{ route('permissions.store') }}', {
                                    name: valName,
                                }, {
                                    headers: {
                                        'X-CSRF-TOKEN': token
                                    }
                                })
                                .then(function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.data.message,
                                        timer: 3000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                })
                                .catch(function(error) {
                                    let errorMessages = '';

                                    if (error.response && error.response.data && error.response.data.csrf_token) {
                                        axios.defaults.headers.common['X-CSRF-TOKEN'] = error.response.data.csrf_token;
                                        const meta = document.querySelector('meta[name="csrf-token"]');
                                        if (meta) {
                                            meta.setAttribute('content', error.response.data.csrf_token);
                                        }
                                    }

                                    if (error.response && error.response.status === 422 && error.response.data.errors) {
                                        Object.values(error.response.data.errors).forEach(function(messages) {
                                            messages.forEach(function(message) {
                                                errorMessages += `${message}<br>`;
                                            });
                                        });
                                    } else if (error.response && error.response.data.message) {
                                        errorMessages = `${error.response.data.message}<br>`;
                                    } else {
                                        errorMessages = 'Terjadi kesalahan saat menambah data.';
                                    }

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        html: errorMessages
                                    });

                                    document.getElementById('SubmitBtn').classList.remove('d-none');
                                    document.getElementById('loadingSpinner').classList.add('d-none');
                                });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8"></div>
    </div>
@endsection
