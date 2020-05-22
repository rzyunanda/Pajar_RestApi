<div class="table-responsive">
    <table class="table" id="instings-table">
        <thead>
            <tr>
                <th>Judul</th>
        <th>Materi</th>
        <th>Status</th>
        <th>Url Video</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($instings as $instings)
            <tr>
                <td>{{ $instings->judul }}</td>
            <td>{{ $instings->materi }}</td>
            <td>{{ $instings->status }}</td>
            <td>{{ $instings->url_video }}</td>
                <td>
                    {!! Form::open(['route' => ['instings.destroy', $instings->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('instings.show', [$instings->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('instings.edit', [$instings->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
