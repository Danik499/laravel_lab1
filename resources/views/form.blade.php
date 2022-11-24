<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-600 leading-tight">
            @if(isset($user))
            {{ __('Edit info of '.$user->name) }}
            @else
            {{ __('Add New User') }}
            @endif
        </h2>
    </x-slot>

    <section class="antialiased bg-gray-100 text-gray-600 px-4 pt-6">
        <div class="flex flex-col h-full">
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <h1>
                        <a href="{{ route('users.index') }}" class="font-bold text-gray-600 hover:text-gray-400">Back</a>
                    </h1>
                </header>

                <form class="m-4 flex flex-col"
                    @if(isset($user))
                    action="{{ route('users.update', $user) }}"
                    @else
                    action="{{ route('users.store') }}"
                    @endif
                    method="post"
                    >
                    @isset($user)
                    @method('PUT')
                    @endisset
                    @csrf
                    <div class="block m-3">
                        <label for="name" class="block text-sm font-medium text-gray-800 ml-1 mt-5">Name</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Name" value="{{ isset($user) ? $user->name : old('name') }}">
                        </div>

                        @error('name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="block m-3">
                        <label for="email" class="block text-sm font-medium text-gray-800 ml-1 mt-5">Email</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="text" name="email" id="email" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Email" value="{{ isset($user) ? $user->email : old('email') }}">
                        </div>

                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    @if(isset($user))
                    @else
                    <div class="block m-3">
                        <label for="email" class="block text-sm font-medium text-gray-800 ml-1 mt-5">Password</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="password" name="password" id="password" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Password">
                        </div>

                        @error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif


                    @isset($user)
                    <p>Change next fields only if you want to update your password. In other case just leave them empty.</p>

                    <input type="password" placeholder="Confirm password" name="confirmPassword" /> <br />
                    @error("confirmPassword")
                        <p>{{$message}}</p>
                    @enderror

                    <input type="password" placeholder="New password" name="password"> <br />
                    @error("password")
                    <p>{{$message}}</p>
                    @enderror
                    @endisset

                    <div class="m-5 flex flex-row-reverse">
                        <button class="bg-transparent hover:bg-gray-500 text-gray-600-700 font-semibold hover:text-white py-2 px-4 border border-gray-600 hover:border-transparent rounded object-right" type="submit">Submit</button>
                    </div>

                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
