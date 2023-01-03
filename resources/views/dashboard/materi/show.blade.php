@extends('dashboard.layouts.main')

@section('container')

<h1>{{ $materi->nama }}</h1>



<object data="{{ $url }}}}"  type="application/pdf"></object>

<iframe src="{{ $url }}" id="pdf_display_frame" width="100%" height="500px"></iframe>
{{-- 
<a href="storage/{{ $materi->file_path }}">Open the pdf!</a>
<div class="div">{{ $url }}   </div> --}}


<div class="row justify-content-center">
    <iframe src="{{ $url }}" width="50%" height="600">
            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a>
    </iframe>
</div>


@endsection
