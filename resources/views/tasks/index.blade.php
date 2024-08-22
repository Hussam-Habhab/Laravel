
<x-layout>
    <div class="flex justify-between p-16">
        

        <div class="flex justify-center  flex-col ">
            
            <div class="mb-10 text-2xl text">Task List</div>
            @if(session('err'))
            <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">

                <p>Success!</p>
                <p>{{session('err')}}</p>
            </div>
       @endif

       @if($tasks)
            @foreach ($tasks as $item)
            <div class=" justify-between m-5  border rounded-md px-5 w-full text-center hover:bg-slate-400">
    
                <a href="{{route('tasks.show',$item)}}">{{$item->title}}</a>
            </div>
            @endforeach

            @else
            <div>there no tasks login </div>
            @endif
            {{-- {{ $tasks->links()  }} --}}
        </div>
{{-- -=-=-==-=-=-=--=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==- --}}
{{-- -=-=-==-=-=-=--=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==- --}}
        <div class="flex mx-10">
            {{-- div1 - for login page --}}
            <div class="mx-4"> 
                <ul>
                    @auth
                    {{-- ----------------------- --}}
                    <li>
                        <a href="{{route('tasks.index')}}">{{auth()->user()->name ?? 'Anynomus'}}:applications</a>
                    </li>
                    {{-- ----------------------- --}}
                    <li>
                        {{-- <form action="{{route('auth.destroy')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Logout</button>
                        </form> --}}
                    </li>
                    {{-- ----------------------- --}}
                    @else
                    <a class="border rounded-md p-2 hover:bg-slate-400" href="{{route('auth.create')}}">Sigh in</a>
                    
                    @endauth
                </ul>
                {{-- <a class="border rounded-md p-2" href="{{route('auth.create')}}">login</a> --}}
            </div>

            {{-- div2 - for adding new task  --}}
            <div>
                <a class="border rounded-md p-2 hover:bg-slate-400" href="{{route('tasks.create')}}">add Task</a>
            </div>
            
        </div>

    </div>

    
        
    

</x-layout>