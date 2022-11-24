<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-600 leading-tight">
            {{ __($user->name) }}
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
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-gray-800">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-bold text-gray-800">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                </dl>
            </div>
        </div>
    </section>

</x-app-layout>
