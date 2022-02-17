<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <button class="btn btn-primary"> <a href="{{route('create-category')}}"> Add Category</a></button>
                    <table class="table mt-2">
                        
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th> 
                           
                                <td>{{$category->type}}</td>
                                
                              
                                <td>
                                    <form action="{{ route('category-edit' ,  $category->id)}}" method="POST"
                                        class="d-inline"
                                    onsubmit="return confirm('are you sure you want to delete {{$category->name}} ? ') ">
                                        @csrf
                                        @method('delete')
                        
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                 <a href="{{route('category-edit' ,$category->id)}}"class="btn btn-secondary">Edit</a>
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
