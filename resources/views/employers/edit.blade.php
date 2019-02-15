@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Employer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employer, ['route' => ['employers.update', $employer->id], 'method' => 'patch']) !!}

                        @include('employers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection