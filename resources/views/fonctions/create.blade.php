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
                    {!! Form::open(['route' => 'fonctions.store']) !!}

                        @include('fonctions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
