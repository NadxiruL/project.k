<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <h6 class="alert alert-danger"> Please insert you input </h6>
                    @endif

                    @if (session('success'))
                        <h6 class="alert alert-success"> {{ session('success') }} </h6>
                    @endif

                    
                    <form class="col-md-4" method="POST" action="{{ route('task-update', $taskLists->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Task Name</label>
                            <input type="text" name="taskname" class="form-control" placeholder="Task name.." value="{{$taskLists->taskname}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputPassword1" value="{{$taskLists->date}}"
                                placeholder="date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($categories as $category)
                             
                                <option {{$category->id == $taskLists->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{$category->type}}</option>
                        
                                @endforeach
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
