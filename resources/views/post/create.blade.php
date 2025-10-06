<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{route('post.create')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!--  image -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="image" type="file" name="image">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!--  title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <!--  Category -->
                    <div>
                        <x-input-label for="category" :value="__('Category')" />
                        <select name="category" id="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @selected(old('category') == $category->id)>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

{{--                    Content--}}
                    <div class="mt-4 ">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full" type="text" name="content"   autofocus >
                            {{old('content')}}
                        </x-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-2" type="submit">
                        Submit
                    </x-primary-button>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
