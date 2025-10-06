<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
    <li class="me-2">
        <a href="/" class="{{request('category') ? 'inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' : 'inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active'}}" aria-current="page">All</a>
    </li>



    @forelse($items as $item)
        <li class="me-2">
            <a href="{{route('post.byCategory' , $item)}}"  class="{{
    Route::currentRouteNamed('post.byCategory') && request('category')->id == $item->id ? 'inline-block px-4 py-2 text-white bg-blue-600 rounded-lg active' : 'inline-block px-4 py-2 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white'
}}">
                {{$item->name}}
            </a>
        </li>
    @empty
        {{$slot}}
    @endforelse

</ul>
