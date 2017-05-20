@extends('settings::layout.settings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr/>
        </div>
        <div class="col-md-6">
            <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Setting</h3>
            <span class="help-block">update record details</span>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-12">
            <hr/>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url(config('settings.route').'/'.$setting->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2 text-right">
                        <a href="{{ url(config('settings.route')) }}" class="btn btn-default">
                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                            Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save" aria-hidden="true"></i> Save
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT"/>

                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                    <label class="control-label col-md-2" for="code">Code <sup class="text-danger">*</sup></label>
                    <div class="col-md-10">
                        <input class="form-control" name="code" id="code" type="text" placeholder="Code"
                               value="{{ old('code',$setting->code) }}"/>
                        <span class="help-block">
                            code will be used for getting the setting value
                        </span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('label') ? ' has-error' : '' }}">
                    <label class="control-label col-md-2" for="label">Label <sup class="text-danger">*</sup></label>
                    <div class="col-md-10">
                        <input class="form-control" name="label" id="label" type="text" placeholder="Label"
                               value="{{ old('label',$setting->label) }}"/>
                        <span class="help-block">
                            label describes the setting
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <input type="checkbox" name="hidden" value="1" {{ !$setting->hidden?'checked':'' }}
                        data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                               data-on="Visible" data-off="Hidden"/>
                        <span class="help-block">
                            <i class="fa fa-warning"></i>
                            click to switch option
                            <br/><b>Visible:</b>
                            <br/>available for editing and shown in list.
                            <br/><b>Hidden:</b>
                            <br/>readonly and not shown in list
                            <br/>unless <b>show_hidden_records</b> in settings config file is enabled.
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('settings::types_value.'.strtolower($setting->type))
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var editor = document.querySelector('.ck-editor');

            if (editor != undefined) {
                CKEDITOR.replace(editor, {});
                CKEDITOR.instances['value'].on('change', function () {
                    CKEDITOR.instances['value'].updateElement()
                });
                CKEDITOR.config.allowedContent = true;
            }

            $('.datepicker').datepicker({
                format: '{{ config('settings.date_format') }}',
            });

            if ($("#values-table").length > 0) {
                $(document).on('click', '#add-value', function () {
                    var index = $('#values-table tr:last').data('index');
                    if (isNaN(index)) {
                        index = 0;
                    } else {
                        index++;
                    }
                    $('#values-table tr:last').after('<tr id="tr_' + index + '" data-index="' + index + '"><td>' +
                        '<input name="{{ $setting->code }}[' + index + '][key]" type="text"' +
                        'value="" class="form-control"/></td><td>' +
                        '<input name="{{ $setting->code }}[' + index + '][value]" type="text"' +
                        'value="" class="form-control"/></td>' +
                        '<td><button type="button" class="btn btn-danger remove-value" data-index="' + index + '">'
                        + '<i class="fa fa-remove"></i></button></td>' +
                        '</tr>');
                });

                $(document).on('click', '.remove-value', function () {
                    var index = $(this).data('index');
                    $("#tr_" + index).remove();
                });
            }
        });
    </script>
@endsection