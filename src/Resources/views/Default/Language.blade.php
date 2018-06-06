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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-resource-{{ $loop->index }}">
                        <thead>
                            <tr>
                                <th></th>
                                <th>@lang('abtmLang::messages.original_messages')</th>
                                <th>@lang('abtmLang::messages.translation_messages')</th>
                            </tr>
                        </thead>
                    </table>
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

            editor[{{ $loop->index }}] = new $.fn.dataTable.Editor( {
                ajax: {
                    url: "{{ route('translator_language_edit', ['language' => $language]) }}",
                    data: function ( d ) {
                        d._token = "{{ csrf_token() }}";
                    }
                },
                table: '#dataTables-resource-{{ $loop->index }}',
                fields: [ {
                        type: "readonly",
                        label: "Original:",
                        name: "original"
                    }, {
                        type: "text",
                        label: "Translation:",
                        name: "translation"
                    }
                ]
            } );

            // Activate an inline edit on click of a table cell
            $('#dataTables-resource-{{ $loop->index }}').on( 'click', 'tbody td:not(:first-child)', function (e) {
                editor[{{ $loop->index }}].inline( this );
            } );

            $('#dataTables-resource-{{ $loop->index }}').DataTable( {
                dom: "<'row'<'col-lg-4 col-md-6'<'pull-left m-r-10'l><'pull-left'B>><'col-lg-8 col-md-6'f>>rtip",
                data: JSON.parse('{!! $resource['messagesJSON'] !!}'),
                order: [[ 1, 'asc' ]],
                columns: [
                    {
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    { data: "original" },
                    { data: "translation" }
                ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
                buttons: [
                    { extend: "edit", editor: editor[{{ $loop->index }}] }
                ]
            } );
        @endforeach
    });
</script>
@endpush