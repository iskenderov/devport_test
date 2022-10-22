<div class="mt-4">
    <form action="{{route('settings.refresh_link')}}" method="post">
        @csrf
        <div class="flex gap-4">
            <x-input-label for="key" :value="__('Secure key')"/>

            <x-text-input
                id="phone"
                class="w-80"
                type="text"
                name="phone"
                value="{{\Illuminate\Support\Facades\Auth::user()->secure_key}}"
                disabled/>

            <x-primary-button class="ml-3">
                {{ __('Refresh Key') }}
            </x-primary-button>
        </div>

    </form>
</div>
<div class="mt-4">
    <form action="{{route('settings.deactivate')}}" method="post">
        @csrf
        <x-primary-button class="ml-3">
            {{ __('Deactivate Link') }}
        </x-primary-button>
    </form>
</div>
<div class="mt-4">
    <form action="{{route('game.roll')}}" method="post">
        @csrf
        <x-primary-button class="ml-3">
            {{ __('Im feeling lucky') }}
        </x-primary-button>
    </form>
</div>
<div class="mt-4">
    <form action="{{route('game.history')}}" method="post">
        @csrf
        <x-primary-button class="ml-3">
            {{ __('History') }}
        </x-primary-button>
    </form>
</div>


