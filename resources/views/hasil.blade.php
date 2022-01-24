@extends('welcome')
@section('content')
@yield('konten')
    <div class="section-heading">
        <h2>HASIL</h2>
    </div>
    <div class="result-content">
        <table id="table-result" class="table table-striped">
            <tr>
                <th>Nomor Siap Terbang</th><td>:</td><td>{{$search->NomorSurat}}</td>
            </tr>
            <tr>
                <th>Isi</th><td>:</td><td>{{$search->Isi}}</td>
            </tr>
            <tr>
                <th>Waktu Submit</th><td>:</td><td>{{\Carbon\Carbon::parse($search->TanggalKirim)->format('d M Y H:i:s')  }}</td>
            </tr>
            <tr>
                <th>Pemeriksa</th><td>:</td><td>{{$search->Nama}}</td>
            </tr>

            {{-- mulai filter jam layanan --}}
            @php
                $jam = Carbon\Carbon::now()->format('H');
                $a = 9;
                $b = 15;
            @endphp

            {{-- jika pencarian digunakan sebelum jam 9.00, maka muncul alert jam Layanan Belum dimulai --}}
            @if ($jam <= $a)
                <th colspan="3"  class="table-warning"><h5 align="center">JAM LAYANAN PERIKSA FISIK BELUM DIMULAI, SILAHKAN TUNGGU SAMPAI 09:00 WIB</h5></td>

            {{-- jika pencarian digunakan setelah jam 15.00, maka muncul alert jam Layanan sudah berakhir --}}
            @elseif ($jam >= $b)
                <th colspan="3" class="table-danger" ><h5 align="center">JAM LAYANAN PERIKSA FISIK TELAH SELESAI, SILAHKAN CEK PADA ESOK HARI ATAU HARI KERJA BERIKUTNYA PADA 09:00 WIB</h5></td>

            {{-- jika dicari pada jam layanan --}}
            @else
                {{-- Filter dokumen yang belum diterima --}}
                @if ($search->TanggalTerima === NULL)
                    <tfoot>
                        <th colspan="3" ><h5 align="center">Dokumen belum diterima, Silahkan tunggu namun jika tidak kunjung muncul nomor antrian silahkan konfirmasi kepada pemeriksa diatas</h5></td>
                    </tfoot>

                {{-- Filter dokumen yang sudah diterima --}}
                @else
                    {{-- menampilkan jumlah yang diterima pemeriksa --}}
                    <tr>
                        <th>Dokumen Ditangani</th><td>:</td><td>{{$pemeriksa->total}} Dokumen</td>
                    </tr>
                    {{-- Menampilkan urutan atau antrian dokumen --}}
                    <tr>
                        <th>Urutan</th>
                        <td>:</td>
                        <td>
                            @foreach ($providers as $p)
                                {{-- menampilkan hanya nomor urutan yang dicari --}}
                                @if ($p->NomorSurat === $search->NomorSurat)
                                {{$p->urut}}

                                    {{-- mulai menampilkan kondisi jika nomor antrian 1 atau 2 --}}
                                    @if ($p->urut == "1")
                                    (Barang sedang diperiksa, jika saat ini belum diperiksa silahkan menghubungi pemeriksa diatas)
                                    @elseif ($p->urut == "2")
                                    (Barang akan segera diperiksa, Silahkan menunggu di area gudang, jika nomor berubah menjadi 1 silahkan menuju barang untuk diperiksa)
                                    {{-- selesai menampilkan kondisi jika nomor antrian 1 atau 2 --}}
                                    {{-- jika selain satu atau 2, diberi keterangan kira-kira berapa jam lagi diperiksa --}}
                                    @else
                                        {{-- Perhitungan dokumen diperiksa paling cepat, logikanya dibuat dikurangani 2 dari nomor antrian --}}
                                        @php
                                            $awal = $p->urut - 2;
                                        @endphp
                                        (Silahkan ditunggu barang anda akan diperiksa {{$awal}} sampai {{$p->urut}} jam dari sekarang)
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endif
            @endif
        </table>
    </div>
@endsection
