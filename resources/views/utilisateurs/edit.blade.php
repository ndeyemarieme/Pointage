@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Utilisateur
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($utilisateur, ['route' => ['utilisateurs.update', $utilisateur->id], 'method' => 'patch']) !!}

                        @include('utilisateurs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection