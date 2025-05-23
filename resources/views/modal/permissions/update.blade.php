<form id="formEditPermissions">
    <div class="form-group">
        <label for="">Name Permissions</label>
        <input type="text" class="form-control" id="valName_ID" placeholder="Entry name permissions" autocomplete="off"
            value="{{ $rowPermissions->name }}">
    </div>
    <div class="form-group">
        <button type="submit" id="SubmitBtn1s" class="btn btn-sm btn-primary btn-space mb-0">Ubah
            Data</button>
        <div id="loadingSpinnersss" class="d-none btn btn-sm btn-danger btn-space mb-0">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Proses Tambah...
        </div>
    </div>
</form>
<script>
    document.getElementById('formEditPermissions').addEventListener('submit', function(e) {
        e.preventDefault();

        const valName_ID = document.getElementById('valName_ID').value;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.getElementById('SubmitBtn1s').classList.add('d-none'); // tombol submit disembunyikan
        document.getElementById('loadingSpinnersss').classList.remove('d-none'); // spinner ditampilkan

        axios.put('{{ route('permissions.put', ['permissionscode' => $rowPermissions->code_permissions]) }}', {
                name: valName_ID,
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
                    showConfirmButton: false,
                    // Pastikan Swal muncul di depan modal
                    didOpen: () => {
                        document.querySelector('.swal2-container').style.zIndex = 20000;
                    }
                }).then(() => {
                    window.location.reload();
                });

                // Kembalikan tombol/spinner ke kondisi awal (opsional karena reload)
                document.getElementById('SubmitBtn1s').classList.remove('d-none');
                document.getElementById('loadingSpinnersss').classList.add('d-none');
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
                    errorMessages = 'Terjadi kesalahan saat mengubah data.';
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    html: errorMessages,
                    customClass: {
                        popup: 'swal-zindex'
                    },
                    didOpen: () => {
                        document.querySelector('.swal2-container').style.zIndex = 20000;
                    }
                });

                document.getElementById('SubmitBtn1s').classList.remove('d-none');
                document.getElementById('loadingSpinnersss').classList.add('d-none');
            });
    });
</script>
