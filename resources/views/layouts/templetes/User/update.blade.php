@extends('layouts.home')
@section('content')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user_add"></i><span class="break"></span>Create New Authorized User</h2>
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
            <form class="form-horizontal" method="POST" action="{{ route('admins.update') }}">
                <fieldset>
                    @csrf
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Name <span style="color:red;">*</span></label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead" name="name" placeholder="Enter Name" value="{!! $users->name !!}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email <span style="color:red;">*</span></label>
                        <div class="controls">
                            <input type="email" class="span6 typeahead" name="email" placeholder="Enter Email" value="{!! $users->email !!}">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="typeahead">Role <span style="color:red;">*</span></label>
                        <div class="controls">
                            <select id="selectError3" name="role_id">
                                <option>Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{!! $role->id !!}">{!! $role->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add User</button>
                        <button type="reset" class="btn">Reset</button>
                        <a class="btn btn-warning" href="{{route('admins.index')}}">Cancel</a>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
@endsection