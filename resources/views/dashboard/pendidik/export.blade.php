<table class="table table-striped" id="table-1">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>BAGIAN</th>
            <th>SUB BAGIAN</th>
            <th>MATA PELAJARAN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guru as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    @switch($item->bagian)
                        @case('Pendidik')
                            Tenaga Pendidik
                            @break
                        @case('Kependidikan')
                            Tenaga Kependidikan
                            @break
                        @case('Kepala Sekolah')
                            Kepala Sekolah
                            @break
                        @default
                            -
                    @endswitch
                </td>
                <td>
                    @switch($item->sub_bagian)
                        @case('Guru')
                            Guru Produktif
                            @break
                        @case('Staff')
                            Staff Kurukulum
                            @break
                        @case('Kepala Sekolah')
                            Kepala Sekolah
                            @break
                        @default
                            -
                    @endswitch
                <td>
                    {{ $item->mapel !== null ? $item->mapel->nama : '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>