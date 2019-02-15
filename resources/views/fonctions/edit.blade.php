@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fonction
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fonction, ['route' => ['fonctions.update', $fonction->id], 'method' => 'patch']) !!}

                        @include('fonctions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection