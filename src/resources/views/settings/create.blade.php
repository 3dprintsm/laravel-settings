@extends('settings::layout.settings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <hr/>
        </div>
        <div class="col-md-6">
            <h3><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Setting</h3>
            <span class="help-block">create new record</span>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-12">
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST" action="{{ url(config('settings.route')) }}" accept-charset="UTF-8"
                  class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="type" value="{{ $type }}"/>

                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                    <label class="control-label col-md-2" for="code">Code <sup class="text-danger">*</sup></label>
                    <div class="col-md-10">
                        <input class="form-control" name="code" id="code" type="text" placeholder="Code"
                               value="{{ old('code') }}"/>
                        <span class="help-block">
                            code will be used for getting the setting value
                        </span>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('label') ? ' has-error' : '' }}">
                    <label class="control-label col-md-2" for="label">Label <sup class="text-danger">*</sup></label>
                    <div class="col-md-10">
                        <input class="form-control" name="label" id="label" type="text" placeholder="Label"
                               value="{{ old('label') }}"/>
                        <span class="help-block">
                            label describes the setting
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <input type="checkbox" name="hidden" value="1"
                               checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
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
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2 text-right">
                        <a href="{{ url()->previous() }}" class="btn btn-default">
                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                            Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save" aria-hidden="true"></i> Save & Continue
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection