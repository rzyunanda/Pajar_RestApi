@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Instings
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($instings, ['route' => ['instings.update', $instings->id], 'method' => 'patch']) !!}

                        @include('instings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection