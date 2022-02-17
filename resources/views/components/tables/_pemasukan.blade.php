<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Nama Jenis</th>
            <th>Deskripsi Pemasukan</th>
            <th>Jumlah Pemasukan</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->Jenis->nama_jenis}}</td>
            <td>{{$item->Pemasukan->deskripsi_pemasukan}}</td>
            <td>Rp. {{number_format($item->amount, 2, ',', '.')}}</td>
            <td>{{date('d F Y', strtotime($item->created_at))}}</td>
            <td>{{date('d F Y', strtotime($item->updated_at))}}</td>
            <td>
                <a href="{{route('pemasukan.edit', $item->id)}}" class="btn btn-sm btn-success" onclick="edit({{$data}})">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="event.preventDefault();
                document.getElementById('hapus-form{{$item->id}}').submit();">Hapus</button>
                <form id="hapus-form{{$item->id}}" action="{{ route('pemasukan.destroy', $item->id) }}" method="POST" class="d-none">
                    {!! Form::hidden('id', $item->id, [null]) !!}
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>