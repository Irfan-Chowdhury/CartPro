@extends('admin.main')

@section('admin_content')
    {!! Menu::render($menuId) !!}

@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
