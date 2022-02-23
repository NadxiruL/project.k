<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($taskLists as $taskList)
                           
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                           
                                <td>{{$taskList->taskname}}</td>
                                <td>{{$taskList->date}}</td>
                                <td>{{$taskList->category->type ?? 'Unknown'}}</td>
                                <td>{{$taskList->status->status ?? 'Incomplete'}}</td>
                               
                                <td>
                                    <form action="{{ route('task-delete' ,  $taskList->id)}}" method="POST"
                                        class="d-inline"
                                    onsubmit="return confirm('are you sure you want to delete {{$taskList->name}} ? ') ">
                                        @csrf
                                        @method('delete')
                        
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                 <a href="{{route('task-edit' ,$taskList->id)}}"class="btn btn-secondary">Edit</a>

                                 <form action="{{ route('status-update' ,  $taskList->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" value="{{$taskList->id}}" name="task_id">
                                    <input type="hidden" value="Complete" name="status" >
                           
                                <button class="btn btn-success">Done</button>
                            
                            
                                    
                                   
                                    
                                   
                            </form>
                                </td>
                       
                    
                            </tr>
                         
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
