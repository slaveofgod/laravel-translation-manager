@extends('abtmViews::layout')

@section('translator_content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('translator_dashboard') }}">{{ trans('abtmLang::messages.dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    <div class="panel-group" id="accordion">
        @foreach ($resources as $resource)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $loop->index }}">{{ $resource['pathname'] }}</a>
                    </h4>
                </div>
                <div id="collapse{{ $loop->index }}" class="panel-collapse collapse {{ $loop->first ? 'in': '' }}">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-resource-{{ $loop->index }}"></table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('translator_javascripts')
    <script>
        var editor = [];
        $(document).ready(function() {
            @foreach ($resources as $resource)
            $('#dataTables-resource-{{ $loop->index }}').DataTable( {
                dom: "<'row'<'col-lg-4 col-md-6'<'pull-left m-r-10'l><'pull-left'B>><'col-lg-8 col-md-6'f>>rtip",
                data: JSON.parse('{!! $resource['messagesJSON'] !!}'),
                select: 'single',
                responsive: true,
                altEditor: true,
                sPaginationType: "full_numbers",
                columns: [{
                    visible: false,
                    data: "DT_RowId",
                    title: "Id",
                    type: "hidden"
                }, {
                    data: "original",
                    title: "@lang('abtmLang::messages.original_messages')",
                    type: "readonly"
                }, {
                    data: "translation",
                    title: "@lang('abtmLang::messages.translation_messages')",
                    type: "text"
                }],
                buttons: [{
                    extend: 'selected',
                    text: 'Edit',
                    name: 'edit'
                }],
                onEditRow: function(datatable, rowdata, success, error) {
                    rowdata['_token'] = "{{ csrf_token() }}";
                    $.ajax({
                        url: "{{ route('translator_language_edit', ['language' => $language]) }}",
                        type: 'POST',
                        data: rowdata,
                        success: success,
                        error: error
                    });
                }
            });
            @endforeach
        });
    </script>
@endpush