@extends('layouts.home')
@section('content')
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon edit"></i><span class="break"></span>Create New Role</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('roles.store') }}">
            <fieldset>
                @csrf
                <div class="control-group">
                    <label class="control-label" for="typeahead">Name</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" id="typeahead" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Display Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="display_name" value="{{old('display_name')}}">
                    </div>
                </div>

                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Description</label>
                    <div class="controls">
                        <textarea class="cleditor" id="textarea2" name="description"rows="3">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Permission</label>
                    @foreach($permissions as $permission)
                    <label class="checkbox inline">
                        <input type="checkbox" name="permissions[]" id="inlineCheckbox1" value="{{$permission->id}}"> {{$permission->name}}
                    </label>
                    @endforeach
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn">Reset</button>
                    <a class="btn btn-warning" href="{{route('roles.index')}}">Cancel</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection