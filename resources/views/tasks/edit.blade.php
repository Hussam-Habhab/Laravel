<x-layout>
    <div class=" flex flex-col  justify-between w-full p-16">
        <form action="{{route('tasks.update',$task)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-10">
            <label for="name">Name: </label>
            <input type="text" name="title" value="{{old('title',$task->title)}}">
        </div>
        
        <div class="mb-10">
            <label for="description">description</label>
            <textarea name="description"  cols="20" rows="4">{{old('description',$task->description)}}</textarea>
        </div>
        
        <div class="mb-10">
            <label for="long_description">long_description</label>
            <textarea name="long_description"  cols="20" rows="4">
                {{old('description',$task->long_description)}}
            </textarea>
        </div>
        
            <button class="p-2 bg-green-400">submit</button>

        </form>
    </div>

</x-layout>