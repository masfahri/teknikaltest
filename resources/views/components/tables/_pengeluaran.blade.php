<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Nama Jenis</th>
            <th>Deskripsi Pengeluaran</th>
            <th>Jumlah Pengeluaran</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->Jenis->nama_jenis}}</td>
            <td>{{$item->Pengeluaran->deskripsi_pengeluaran ?? '-'}}</td>
            <td>Rp. {{number_format($item->amount, 2, ',', '.')}}</td>
            <td>{{date('d F Y', strtotime($item->created_at))}}</td>
            <td>{{date('d F Y', strtotime($item->updated_at))}}</td>
            <td>
                <a href="{{route('pengeluaran.edit', $item->id)}}" class="btn btn-sm btn-success" onclick="edit({{$data}})">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="event.preventDefault();
                document.getElementById('hapus-form{{$item->id}}').submit();">Hapus</button>
                <form id="hapus-form{{$item->id}}" action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" class="d-none">
                    {!! Form::hidden('id', $item->id, [null]) !!}
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>