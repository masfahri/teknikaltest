<div class="row">
    <div class="col-12">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Debit</th>
                    <th>Kredit</th>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>
                        {{GetTable('tanggal', $item)}}
                    </td>
                    <td>
                        {{GetTable('keterangan', $item)}}
                    </td>
                    <td>{{GetTable('debit', $item)}}</td>
                    <td>{{GetTable('kredit', $item)}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>