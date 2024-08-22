<x-layout >
    <div class="border rounded-md p-3 w-2/3">
        <h1 class="mb-3 text-xl">title: {{$task->title}}</h1>
        <hr class="m-2">
    
    <h1 class="mb-3 text-xl p-3">Description: {{$task->description}}</h1>
    <h1 class="mb-3 text-xl p-3">Long Description: {{$task->long_description}}</h1>

    </div>
    <div>
        <form action="{{route('tasks.destroy',$task)}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="border p-2 border-red-500 bg-red-300 hover:bg-red-500        rounded-md">Delete</button>

        </form>

    </div>
    <div>
            <a href="{{route('tasks.edit',$task)}}" class="border p-2 border-blue-500 bg-blue-300 hover:bg-blue-500 rounded-md">Edit</a>
    
            
    </div>
    
    
</x-layout>