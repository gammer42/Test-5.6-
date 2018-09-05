@extends('layouts.home')
@section('content')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon "></i><span class="break"></span>Roles</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        @if(session('message'))
            <h3 class="alert alert-success">{{session('message')}}</h3>
        @endif
        <div class="box-content">
            @permission('role-create')
            <a class="btn btn-primary data-table-btn" href="{{route('roles.create')}}" style="margin-bottom:10px;">Add new</a>
            @endpermission
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)

                <tr>
                    <td>{{$role->id}}</td>
                    <td class="center">{!! $role->name !!}</td>
                    <td class="center">{!! $role->display_name !!}</td>
                    <td class="center">
                        <span class="">{!! $role->description !!}</span>
                    </td>
                    <td class="center">
                        @permission('role-show')
                        <a style="float:left; margin-right:5px;" class="btn btn-success" href="{{route('roles.show',$role->id)}}" title="Show">
                            <i class="halflings-icon white zoom-in"></i>
                        </a>
                        @endpermission
                        @permission('role-edit')
                        <a style="float:left; margin-right:5px;" class="btn btn-info" href="{{route('roles.edit',$role->id)}}" title="Edit">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        @endpermission
                        <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                            @permission('role-delete')
                        <button type="submit" class="btn btn-danger"  title="Delete" onclick="return confirmDelete()">
                            <i class="halflings-icon white trash"></i>
                        </button>
                            @endpermission
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!--/span-->
    @endsection