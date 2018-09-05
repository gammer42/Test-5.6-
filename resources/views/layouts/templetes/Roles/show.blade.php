@extends('layouts.home')
@section('content')
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon "></i><span class="break"></span>Specified Roles</h2>
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered ">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="center">{{$show_role->name}}</td>
                        <td class="center">{{$show_role->display_name}}</td>
                        <td class="center">
                            <span class="">{!! $show_role->description !!}</span>
                        </td>
                        <td class="center">
                            @foreach($show_permission as $permission)
                            <label class="label label-success">{{$permission->name}}</label>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--/span-->
@endsection