@extends('layouts.home')
@section('content')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Users</h2>
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
            @permission('role-create-user')
            <a class="btn btn-primary data-table-btn" href="{{route('admins.create')}}" style="margin-bottom:10px;">Add new</a>
            @endpermission
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; ?>
                @foreach($users as $user)

                    <tr>
                        <td>{{++$i}}</td>
                        <td class="center">{!! $user->name !!}</td>
                        <td class="center">{!! $user->email !!}</td>
                        <td class="center">
                            @foreach($user->roles as $role)
                            <span class="label-success">{!! $role->name !!}</span>
                            @endforeach
                        </td>
                        <td class="center">
                            @permission('role-show-user')
                            <a style="float:left; margin-right:5px;" class="btn btn-success" href="{{route('admins.show',$user->id)}}" title="Show">
                                <i class="halflings-icon white zoom-in"></i>
                            </a>
                            @endpermission
                            @permission('role-update-user')
                            <a style="float:left; margin-right:5px;" class="btn btn-info" href="{{route('admins.edit',$user->id)}}" title="Edit">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            @endpermission
                            <form action="{{route('admins.destroy',$user->id)}}" method="POST">
                                @permission('role-delete-user')
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