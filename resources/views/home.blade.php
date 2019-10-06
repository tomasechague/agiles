@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Map</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13088.543012821134!2d-57.933428871923816!3d-34.90304259542913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sar!4v1570238446543!5m2!1ses!2sar" width="875" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
