@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1>Total Data NIK dan TPS</h1>
            </div>
            <div class="card-body">
                    <div class="card bg-light-primary">
                        <div class="card-body">
                            <h5 class="card-title text-info">Jumlah Data NIK</h5>
                            <h3 class="card-text text-dark-primary fw-bolder">{{$count}}</h3>
                            

                        </div>
                        <a href="{{ route('nik.index') }}" class="btn btn-primary">Cari NIK</a>
                    </div>
                
            </div>
        </div>
    </div>



@endsection
