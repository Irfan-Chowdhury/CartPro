@extends('admin.main')
@section('admin_content')

    {!! Menu::render() !!}

@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
