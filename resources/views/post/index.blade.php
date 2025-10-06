<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-category-tabs>
                        no category find yet.....
                    </x-category-tabs>

                </div>
            </div>

        <div class="text-gray-900 mt-8">

                @forelse($posts as $post)
                <x-post-item :post="$post"/>
                @empty
                    <div>
                        <p class="text-gray-900">no post found</p>
                    </div>

                    @endforelse




           </div>
            {{$posts->onEachSide(1)->links()}}
        </div>
    </div>

</x-app-layout>
