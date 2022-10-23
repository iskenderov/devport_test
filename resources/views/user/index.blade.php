<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mt-4 flex justify-end">
                    <x-primary-link href="{{route('user.create')}}">
                        Create
                    </x-primary-link>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Phone
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Date
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$user->name}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$user->phone}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$user->created_at}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <form action="{{route('user.edit',$user->id)}}" method="get">
                                            <x-primary-button class="ml-4">
                                                {{ __('Edit') }}
                                            </x-primary-button>
                                        </form>
                                        <form action="{{route('user.destroy',$user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button class="ml-4">
                                                {{ __('Delete') }}
                                            </x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
