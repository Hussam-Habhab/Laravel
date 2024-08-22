<x-layout>
    <div class=" flex flex-col p-4 justify-between w-full p-16">
        <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="mb-10">
            <label for="name">Name: </label>
            <input type="text" name="title">
        </div>
        
        <div class="mb-10">
            <label for="description">description</label>
            <textarea name="description"  cols="20" rows="4"></textarea>
        </div>
        
        <div class="mb-10">
            <label for="long_description">long_description</label>
            <textarea name="long_description"  cols="20" rows="4"></textarea>
        </div>
        
            <button class="p-2 bg-green-400">submit</button>

        </form>
    </div>

</x-layout>