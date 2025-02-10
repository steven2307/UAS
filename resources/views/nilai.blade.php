@extends('layouts.app')

@section('content')
@auth
    <div class="container text-center">
        <div class="row">
            <div class="col border-end border-3">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/images/'.$dosen->gambar) }}" class="profile" alt="Gambar profil">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <table style="width: 300px;" class="text-start">
                        <tr>
                            <td>NIDN</td>
                            <td>:</td>
                            <td>{{ $dosen->nomor_induk }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $dosen->name }}</td>
                        </tr>
                        <tr>
                            <td>Nama Mapel</td>
                            <td>:</td>
                            <td>{{ $mapel->mapel }}</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td>{{ $mapel->semester }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-8 ps-4 text-center">
                @if ($nilai)
                <h4 class="text-success">Anda sudah memberikan penilaian.</h4>
                <div class="mb-3 text-start">
                    <label class="fw-bold">1. Suasana Kelas dan Interaksi</label><br>
                    <table>
                        <tr>
                            <td style="vertical-align:top">Meliputi</td>
                            <td style="vertical-align:top"> : </td>
                            <td class="ps-1">
                                -Dosen menciptakan suasana kelas yang kondusif/termotivasi.<br>
                                -Dosen memberikan kesempatan diskusi dan tanya jawab.<br>
                                -Dosen mereview dan melakukan tanya jawab terhadap materi sebelumnya.
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td> : </td>
                            <td class="fw-bold ps-1">{{ $nilai->getLabel($nilai->suasana_kelas) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="mb-3 text-start">
                    <label class="fw-bold">2. Pengelolaan Waktu dan Kehadiran</label>
                    <table>
                        <tr>
                            <td style="vertical-align:top">Meliputi</td>
                            <td style="vertical-align:top"> : </td>
                            <td class="ps-1">
                                -Dosen tepat waktu dalam mengawali dan mengakhiri perkuliahan.<br>
                                -Dosen tidak pernah meniadakan kuliah tanpa alasan yang jelas.<br>
                                -Dosen mampu memanfaatkan waktu secara efektif untuk menyelesaikan materi.
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td> : </td>
                            <td class="fw-bold ps-1">{{ $nilai->getLabel($nilai->waktu_kehadiran) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="mb-3 text-start">
                    <label class="fw-bold">3. Kualitas Pengajaran dan Materi</label>
                    <table>
                        <tr>
                            <td style="vertical-align:top">Meliputi</td>
                            <td style="vertical-align:top"> : </td>
                            <td class="ps-1">
                                -Dosen menguasai materi matakuliah yang diajarkan.<br>
                                -Materi yang disampaikan mudah dipahami dan dimengerti.<br>
                                -Materi mata kuliah selalu diperbaharui dengan contoh atau perkembangan terakhir.
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td> : </td>
                            <td class="fw-bold ps-1">{{ $nilai->getLabel($nilai->kualitas_pengajaran) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="mb-3 text-start">
                    <label class="fw-bold">4. Tugas dan Penilaian</label>
                    <table>
                        <tr>
                            <td style="vertical-align:top">Meliputi</td>
                            <td style="vertical-align:top"> : </td>
                            <td class="ps-1">
                                -Dosen memberikan kesimpulan diakhir penyampaian materi.<br>
                                -Dosen memberikan tugas sesuai dengan materi yang dipelajari.<br>
                                -Dosen menyelesaikan materi sesuai RPS (Rencana Pembelajaran Semester).
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td> : </td>
                            <td class="fw-bold ps-1">{{ $nilai->getLabel($nilai->tugas_penilaian) }}</td>
                        </tr>
                    </table>
                </div>

                <div class="mb-3 text-start">
                    <label class="fw-bold">5. Profesionalisme Dosen</label>
                    <table>
                        <tr>
                            <td style="vertical-align:top">Meliputi</td>
                            <td style="vertical-align:top"> : </td>
                            <td class="ps-1">
                                -Dosen berpenampilan rapi, bersih dan sopan.<br>
                                -Dosen menjadi teladan bagi peserta didik.<br>
                                -Dosen memiliki toleransi terhadap keberagaman mahasiswa.
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td> : </td>
                            <td class="fw-bold ps-1">{{ $nilai->getLabel($nilai->profesionalisme) }}</td>
                        </tr>
                    </table>
                </div>

                @else
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="id_mapel" value="{{ $mapel->id }}">
                    <input type="hidden" name="id_dosen" value="{{ $dosen->id_dosen }}">

                    <div class="mb-3 text-start">
                        <label class="fw-bold">1. Suasana Kelas dan Interaksi</label><br>
                        <table>
                            <tr>
                                <td style="vertical-align:top">Meliputi :</td>
                                <td>
                                    -Dosen menciptakan suasana kelas yang kondusif/termotivasi.<br>
                                    -Dosen memberikan kesempatan diskusi dan tanya jawab.<br>
                                    -Dosen mereview dan melakukan tanya jawab terhadap materi sebelumnya.
                                </td>
                            </tr>
                        </table>
                        <div>
                            <label><input type="radio" name="suasana_kelas" value="5" required> Sangat Baik</label><br>
                            <label><input type="radio" name="suasana_kelas" value="4"> Baik</label><br>
                            <label><input type="radio" name="suasana_kelas" value="3"> Biasa</label><br>
                            <label><input type="radio" name="suasana_kelas" value="2"> Buruk</label><br>
                            <label><input type="radio" name="suasana_kelas" value="1"> Sangat Buruk</label><br>
                        </div>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="fw-bold">2. Pengelolaan Waktu dan Kehadiran</label>
                        <table>
                            <tr>
                                <td style="vertical-align:top">Meliputi :</td>
                                <td>
                                    -Dosen tepat waktu dalam mengawali dan mengakhiri perkuliahan.<br>
                                    -Dosen tidak pernah meniadakan kuliah tanpa alasan yang jelas.<br>
                                    -Dosen mampu memanfaatkan waktu secara efektif untuk menyelesaikan materi.
                                </td>
                            </tr>
                        </table>
                        <div>
                            <label><input type="radio" name="waktu_kehadiran" value="5" required> Sangat Baik</label><br>
                            <label><input type="radio" name="waktu_kehadiran" value="4"> Baik</label><br>
                            <label><input type="radio" name="waktu_kehadiran" value="3"> Biasa</label><br>
                            <label><input type="radio" name="waktu_kehadiran" value="2"> Buruk</label><br>
                            <label><input type="radio" name="waktu_kehadiran" value="1"> Sangat Buruk</label><br>
                        </div>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="fw-bold">3. Kualitas Pengajaran dan Materi</label>
                        <table>
                            <tr>
                                <td style="vertical-align:top">Meliputi :</td>
                                <td>
                                    -Dosen menguasai materi matakuliah yang diajarkan.<br>
                                    -Materi yang disampaikan mudah dipahami dan dimengerti.<br>
                                    -Materi mata kuliah selalu diperbaharui dengan contoh atau perkembangan terakhir.
                                </td>
                            </tr>
                        </table>
                        <div>
                            <label><input type="radio" name="kualitas_pengajaran" value="5" required> Sangat Baik</label><br>
                            <label><input type="radio" name="kualitas_pengajaran" value="4"> Baik</label><br>
                            <label><input type="radio" name="kualitas_pengajaran" value="3"> Biasa</label><br>
                            <label><input type="radio" name="kualitas_pengajaran" value="2"> Buruk</label><br>
                            <label><input type="radio" name="kualitas_pengajaran" value="1"> Sangat Buruk</label><br>
                        </div>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="fw-bold">4. Tugas dan Penilaian</label>
                        <table>
                            <tr>
                                <td style="vertical-align:top">Meliputi :</td>
                                <td>
                                    -Dosen memberikan kesimpulan diakhir penyampaian materi.<br>
                                    -Dosen memberikan tugas sesuai dengan materi yang dipelajari.<br>
                                    -Dosen menyelesaikan materi sesuai RPS (Rencana Pembelajaran Semester).
                                </td>
                            </tr>
                        </table>

                        <div>
                            <label><input type="radio" name="tugas_penilaian" value="5" required> Sangat Baik</label><br>
                            <label><input type="radio" name="tugas_penilaian" value="4"> Baik</label><br>
                            <label><input type="radio" name="tugas_penilaian" value="3"> Biasa</label><br>
                            <label><input type="radio" name="tugas_penilaian" value="2"> Buruk</label><br>
                            <label><input type="radio" name="tugas_penilaian" value="1"> Sangat Buruk</label><br>
                        </div>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="fw-bold">5. Profesionalisme Dosen</label>
                        <table>
                            <tr>
                                <td style="vertical-align:top">Meliputi :</td>
                                <td>
                                    Dosen berpenampilan rapi, bersih dan sopan.<br>
                                    Dosen menjadi teladan bagi peserta didik.<br>
                                    Dosen memiliki toleransi terhadap keberagaman mahasiswa.
                                </td>
                            </tr>
                        </table>
                        <div>
                            <label><input type="radio" name="profesionalisme" value="5" required> Sangat Baik</label><br>
                            <label><input type="radio" name="profesionalisme" value="4"> Baik</label><br>
                            <label><input type="radio" name="profesionalisme" value="3"> Biasa</label><br>
                            <label><input type="radio" name="profesionalisme" value="2"> Buruk</label><br>
                            <label><input type="radio" name="profesionalisme" value="1"> Sangat Buruk</label><br>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Penilaian</button>
                </form>
                @endif
            </div>
        </div>
    </div>
@endauth
@endsection
