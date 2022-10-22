<x-app-layout>
    @include('game.partial.header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('game.partial.menu')
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <p class="font-bold text-2xl">Congratulation You are Lucky</p>
                    <p class="text-lg">Your number is
                        <span class="text-2xl">{{$reward->getNumber()}}</span>
                    </p>
                    <p class="text-lg">Your reward is
                        <span class="text-2xl">{{$reward->getReward()}}</span></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
