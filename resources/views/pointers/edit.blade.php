@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pointer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pointer, ['route' => ['pointers.update', $pointer->id], 'method' => 'patch']) !!}

                        @include('pointers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection