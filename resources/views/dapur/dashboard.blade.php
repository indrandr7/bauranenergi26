@extends('layout.dapur.app')

@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="m-b-10">{{ $judulhalaman }}</h5>
                        <p class="text-muted m-b-10">Periode: Semester 1 (Januari - Juni 2026)</p>

                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-body">
                                        <h6 class="text-white">Total Pasokan Energi Final</h6>
                                        <h2 class="text-end text-white">
                                            <i class="fa-regular fa-newspaper"></i> <span>{{ \App\Helpers\Gudangfungsi::formatdesimal($profilenergi->total_energi_final) }}</span><span style="font-size:10px;">TOE</span>
                                        </h2>
                                        <p class="m-b-0" style="font-size:12px;">
                                            Semester 1 (Jan-Jun 2026)
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-body">
                                        <h6 class="text-white">Energi Baru Terbarukan (EBT)</h6>
                                        <h2 class="text-end text-white">
                                            <i class="fa-solid fa-circle-info"></i> <span>{{ \App\Helpers\Gudangfungsi::formatdesimal($profilenergi->total_ebt) }}</span><span style="font-size:10px;">TOE</span>
                                        </h2>
                                        <p class="m-b-0" style="font-size:12px;">
                                            18,98% dari Total Energi
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-body">
                                        <h6 class="text-white">Target EBT RUED Tahun 2026</h6>
                                        <h2 class="text-end text-white">
                                            <i class="fa-regular fa-clipboard"></i> <span>{{ \App\Helpers\Gudangfungsi::formatdesimal($profilenergi->target_ebt) }}</span>
                                        </h2>
                                        <p class="m-b-0" style="font-size:12px;">
                                            Capaian terhadap Target {{ $profilenergi->target_ebt_capaian }}%
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-red order-card">
                                    <div class="card-body">
                                        <h6 class="text-white">Perubahan vs Semester 1</h6>
                                        <h2 class="text-end text-white">
                                            <i class="fa-regular fa-file-video"></i> <span>+2,45%</span>
                                        </h2>
                                        <p class="m-b-0" style="font-size:12px;">
                                            Naik 2,45 poin persentase
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                            <div class="col-md-5">
                                <h6 class="text-black">BAURAN ENERGI DAERAH</h6>
                                <div style="text-align:center;">
                                    <img width="350px" src="{{ asset('uploads/pie-chart-bed.png') }}">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="dt-responsive table-responsive">
                                    <table id="tabelku" class="table table-striped table-bordered table-hover nowrap2" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="40%" style="text-align:center;">Sumber Energi</th>
                                                <th width="30%" style="text-align:center;">Jumlah (TOE)</th>
                                                <th width="30%" style="text-align:center;">Persentase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sumberenergi as $energi)
                                                <tr>
                                                    <td>{{ $energi->sumber_energi }}</td>
                                                    <td style="text-align:center;">{{ $energi->jumlah_toe }}</td>
                                                    <td style="text-align:left;">{{ $energi->persentase }}%</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-top:40px;">
                                <div class="card bg-c-default order-card" style="background-color: #E8F2EF !important;">
                                    <div class="card-body">
                                        <p class="m-b-0" style="font-size:12px;color:#000000;">
                                            Bauran Energi Final menunjukkan perbandingan kontribusi masing-masing sumber energi terhadap total pasokan energi final di Provinsi Sumatera Barat pada Semester 1 (Januari-Juni) 2026.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection