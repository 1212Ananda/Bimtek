@extends('layouts.dashboard')

@section('content')
<style>
    .disabled-option {
        color: rgb(61, 60, 60);
        background-color: #999999;
    }
</style>
    <div class="container-fluid">
        <div class="card shadow border-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Tambah Jadwal Pelatihan ({{ $pendaftaran->judul_bimtek }})
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal-pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="jadwal-container">
                        <div class="jadwal-item mb-3">
                            <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-2">
                                    <label for="tahap" class="form-label">Tahap</label>
                                    <input type="text" class="form-control" name="tahap[]" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                                    <input type="datetime-local" class="form-control" name="tanggal_pelaksanaan[]" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="instruktur" class="form-label">Instruktur</label>
                                    <select class="form-control instruktur-select" name="instruktur[]" required>
                                        <option value="Instruktur 1">Instruktur 1</option>
                                        <option value="Instruktur 2">Instruktur 2</option>
                                        <option value="Instruktur 3">Instruktur 3</option>
                                        <option value="Instruktur 4">Instruktur 4</option>
                                        <option value="Instruktur 5">Instruktur 5</option>
                                        <option value="Instruktur 6">Instruktur 6</option>
                                        <option value="Instruktur 7">Instruktur 7</option>
                                        <option value="Instruktur 8">Instruktur 8</option>
                                        <option value="Instruktur 9">Instruktur 9</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="ruangan" class="form-label">Ruangan</label>
                                    <select class="form-control ruangan-select" name="ruangan[]" required>
                                        <option value="ruangan 1">ruangan 1</option>
                                        <option value="ruangan 2">ruangan 2</option>
                                        <option value="ruangan 3">ruangan 3</option>
                                        <option value="ruangan 4">ruangan 4</option>
                                        <option value="ruangan 5">ruangan 5</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="file_pendukung" class="form-label">File Pendukung</label>
                                    <input type="file" class="form-control" name="file_pendukung[]" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger cancel-btn mt-4">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="add-jadwal">Tambah Jadwal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

<script>
    $(document).ready(function () {
        var existingSchedules = {!! json_encode($jadwalPelatihan->toArray()) !!};
        console.log('Existing Schedules:', existingSchedules);

        function formatDateToDatabaseFormat(date) {
            var d = new Date(date);
            var formattedDate = d.getFullYear() + '-' + 
                                ('0' + (d.getMonth() + 1)).slice(-2) + '-' +
                                ('0' + d.getDate()).slice(-2);
            console.log('Formatted Date:', formattedDate);
            return formattedDate;
        }

        function updateOptions() {
            console.log('Update Options Called');
            $('.instruktur-select, .ruangan-select').each(function() {
                var $this = $(this);
                var $parentRow = $this.closest('.row');
                var tanggalPelaksanaan = $parentRow.find('input[name="tanggal_pelaksanaan[]"]').val();
                var instrukturSelect = $parentRow.find('.instruktur-select');
                var ruanganSelect = $parentRow.find('.ruangan-select');

                console.log('Tanggal Pelaksanaan:', tanggalPelaksanaan);

                instrukturSelect.find('option').prop('disabled', false).removeClass('disabled-option');
                ruanganSelect.find('option').prop('disabled', false).removeClass('disabled-option');

                if (tanggalPelaksanaan) {
                    var formattedDate = formatDateToDatabaseFormat(tanggalPelaksanaan);
                    console.log('Formatted Date for comparison:', formattedDate);
                    existingSchedules.forEach(function(schedule) {
                        var scheduleDate = schedule.tanggal_pelaksanaan.split(' ')[0];
                        console.log('Comparing with schedule date:', scheduleDate);
                        if (scheduleDate == formattedDate) {
                            console.log('Match found:', schedule);
                            instrukturSelect.find('option[value="' + schedule.instruktur + '"]').prop('disabled', true).addClass('disabled-option');
                            ruanganSelect.find('option[value="' + schedule.ruangan + '"]').prop('disabled', true).addClass('disabled-option');
                        } else {
                            console.log('No match:', schedule);
                        }
                    });
                }
            });
        }

        $(document).on('change', 'input[name="tanggal_pelaksanaan[]"]', function() {
            updateOptions();
        });

        $('#add-jadwal').click(function () {
            var jadwalItem = `
                <div class="jadwal-item mb-3">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2">
                            <label for="tahap" class="form-label">Tahap</label>
                            <input type="text" class="form-control" name="tahap[]" required>
                        </div>
                        <div class="col-md-2">
                            <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                            <input type="datetime-local" class="form-control" name="tanggal_pelaksanaan[]" required>
                        </div>
                        <div class="col-md-2">
                            <label for="instruktur" class="form-label">Instruktur</label>
                            <select class="form-control instruktur-select" name="instruktur[]" required>
                                <option value="Instruktur 1">Instruktur 1</option>
                                <option value="Instruktur 2">Instruktur 2</option>
                                <option value="Instruktur 3">Instruktur 3</option>
                                <option value="Instruktur 4">Instruktur 4</option>
                                <option value="Instruktur 5">Instruktur 5</option>
                                <option value="Instruktur 6">Instruktur 6</option>
                                <option value="Instruktur 7">Instruktur 7</option>
                                <option value="Instruktur 8">Instruktur 8</option>
                                <option value="Instruktur 9">Instruktur 9</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="ruangan" class="form-label">Ruangan</label>
                            <select class="form-control ruangan-select" name="ruangan[]" required>
                                <option value="ruangan 1">ruangan 1</option>
                                <option value="ruangan 2">ruangan 2</option>
                                <option value="ruangan 3">ruangan 3</option>
                                <option value="ruangan 4">ruangan 4</option>
                                <option value="ruangan 5">ruangan 5</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="file_pendukung" class="form-label">File Pendukung</label>
                            <input type="file" class="form-control" name="file_pendukung[]" required>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger cancel-btn mt-4">Batal</button>
                        </div>
                    </div>
                </div>
            `;
            $('#jadwal-container').append(jadwalItem).slideDown();
        });

        // Menambahkan event listener untuk tombol pembatalan
        $(document).on('click', '.cancel-btn', function () {
            $(this).closest('.jadwal-item').remove(); // Menghapus item jadwal dari DOM
        });
    });
</script>

      
        
@endsection
