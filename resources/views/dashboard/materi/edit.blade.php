@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-12 mb-4">
        
        <div class="card bg-yellow-100 border-0 shadow">
             <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                <div class="d-block mb-3 mb-sm-0">
                    <h2 class="fs-3 fw-extrabold"> Edit Materi </h2>
                 </div>
             </div>
        
        <div class="card border-0 shadow components-section">
            <div class="card-body">     
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <form method="post" action="/dashboard/materis/{{ $materi->id }}" enctype="multipart/form-data" >
                                @method('put')
                                @csrf
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="materi">Nama Materi</label>
                                    <input type="text" class="form-control @error ('materi') is-invalid @enderror" id="materi" aria-describedby="emailHelp"
                                    name="nama" required autofocus value = '{{ old('materi',$materi->nama) }}'>
                                
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-4">
                                    <label class="my-1 me-2" for="pelajaran">Pelajaran</label>
                                    
                                    <select  name="id_pelajaran" class="form-select @error ('country') is-invalid @enderror" required id="country" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($pelajarans as $pelajarans)
                                            @if(old('id_pelajaran', $materi->id_pelajaran == $pelajarans->id))
                                                <option value="{{ $pelajarans->id }}" selected>{{ $pelajarans->nama }}</option>
                                            @else
                                                <option value="{{ $pelajarans->id }}">{{ $pelajarans->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Input materi</label>
                                    <input class="form-control @error ('formFile') is-invalid @enderror" name="file" required type="file" id="file" 
                                    value = "{{ old('file', $materi->file_path) }}" selected>
                                    <small id="Help" class="form-text text-muted">File dalam bentuk PDF.</small>
                                </div>
                                <!-- End of Form -->
                                <button class="btn btn-primary" type="submit">Submit</button> 
                                <tfoot>
                                    <select data-columns='0' name="filter" id=""></select>
                                </tfoot>
                            </form>
                        </div>
                    </div>
                            
            </div>
        </div>
    </div>
@endsection