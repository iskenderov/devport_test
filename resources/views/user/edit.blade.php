<x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{route('user.update',$user)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')"/>

                                <x-text-input id="name" class="block mt-1" type="text" name="name"
                                              value="{{$user->name}}" required autofocus/>

                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="phone" :value="__('Phone')"/>

                                <x-text-input id="phone" class="block mt-1 " type="text" name="phone"
                                              value="{{$user->phone}}" required/>

                                <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
