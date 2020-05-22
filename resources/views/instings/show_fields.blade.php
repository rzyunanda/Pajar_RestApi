<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{{ $instings->judul }}</p>
</div>

<!-- Materi Field -->
<div class="form-group">
    {!! Form::label('materi', 'Materi:') !!}
    <p>{{ $instings->materi }}</p>
</div>

<!-- Materi Field -->
<div class="form-group">
    {!! Form::label('video', 'Video:') !!}
    <p>{{ $instings->url_video }}</p>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $instings->status }}</p>
</div>

