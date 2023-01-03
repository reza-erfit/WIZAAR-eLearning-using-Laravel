@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Course Information</h2>
                            </div>
                        
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th class="border-bottom" scope="col">#</th>
                                <th class="border-bottom" scope="col">Nama Pelajaran</th>
                                <th class="border-bottom" scope="col">Kategori</th>
                                <th class="border-bottom" scope="col">Action</th>
                            </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        
    </div>
</div>

@endsection

