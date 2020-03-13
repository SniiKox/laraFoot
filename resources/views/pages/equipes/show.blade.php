@extends('default')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List équipes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('equipes.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Libelle:</strong>
                {{ $equipe->libelle }}

                <p>championnat : {{ $championnat }}</p>
            </div>
        </div>
    </div>
@endsection