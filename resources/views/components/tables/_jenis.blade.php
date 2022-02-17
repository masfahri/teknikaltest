<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Nama Jenis</th>
            <th>Kategori</th>
            <th>Created At</th>
            <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->nama_jenis}}</td>
            <td>{{$item->kategori}}</td>
            <td>{{date('d F Y', strtotime($item->created_at))}}</td>
            <td>
                <a href="{{route('jenis.edit', $item->id)}}" class="btn btn-sm btn-success">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="event.preventDefault();
                document.getElementById('hapus-form{{$item->id}}').submit();">Hapus</button>
                <form id="hapus-form{{$item->id}}" action="{{ route('jenis.destroy', $item->id) }}" method="POST" class="d-none">
                    {!! Form::hidden('id', $item->id, [null]) !!}
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>