{{-- * Mengambil template dari file views/layouts/app --}}
@extends('layouts.app')

{{-- 
    * Section untuk link template
    todo Copy kode CSS Libraries
--}}
@section('link')
    {{-- todo Paste kode seperti contoh dibawah --}}
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
{{-- 
    * Section untuk Main Content 
    ? Tulis kode disini
--}}
@endsection

{{-- 
    * Section untuk script template
    todo Copy kode JS Libraies & Page Specific JS File
--}}
@section('script')
    {{-- todo Paste kode seperti contoh dibawah --}}
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
@endsection
