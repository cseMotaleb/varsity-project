@extends('back-end.master')
@push('backend_stylesheets')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endpush
@section('content')
    <section class="dc-haslayout" id="doctor_appointments">
        <appointments :type="'doctor'"></appointments>
    </section>
@endsection
@push('backend_scripts')
    <script src="{{ asset('js/chosen.jquery.js') }}"></script>
    <script>
        jQuery(".dc-chosen-select").chosen();
    </script>
@endpush
