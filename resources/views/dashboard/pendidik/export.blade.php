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
                    @if ($item->bagian === 'pendidik')
                        Tenaga Pendidik
                    @elseif ($item->bagian === 'pegawai')
                        Tenaga Kepegawaian
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($item->sub_bagian === 'guru')
                        Guru Produktif
                    @elseif ($item->sub_bagian === 'staff')
                        Staff Kurikulum
                    @else
                        -
                    @endif
                <td>
                    {{ $item->mapel !== null ? $item->mapel->nama : '-' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>