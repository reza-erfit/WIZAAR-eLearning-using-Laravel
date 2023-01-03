@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-12 mb-4">
        
        <div class="card bg-yellow-100 border-0 shadow">
             <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <h2 class="fs-3 fw-extrabold"> Edit pelajaran </h2>
                 </div>
             </div>
        
        <div class="card border-0 shadow components-section">
            <div class="card-body">     
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <form method="post" action="/dashboard/pelajarans/{{ $pelajaran->id }}" enctype="multipart/form-data" >
                                @method('put')
                                @csrf
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="pelajaran">Nama Pelajaran</label>
                                    <input type="text" class="form-control @error ('pelajaran') is-invalid @enderror" id="pelajaran" aria-describedby="emailHelp"
                                    name="nama" required autofocus value = '{{ old('pelajaran',$pelajaran->nama) }}'>
                                
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="pelajaran">Pelajaran</label>
                                    
                                    <select  name="id_kategori" class="form-select @error ('country') is-invalid @enderror" required id="country" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($kategoris as $kategori)
                                            @if(old('id_kategori', $pelajaran->id_kategori == $kategori->id))
                                                <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                                            @else
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                
                                </div>
                                <!-- End of Form -->
                                <button class="btn btn-primary" type="submit">Submit</button> 

                            </form>
                        </div>
                    </div>
                            
            </div>
        </div>
    </div>
@endsection