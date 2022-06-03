<x-app-layout>
    <section class="py-26  mb-5">
        <div class="container px-4 mx-auto relative">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-2xl md:text-2xl font-extrabold font-heading mt-4 mb-4">Available Vacancies</h1>
                @if (Session::has('error'))
                    <div class="py-8 px-6">
                        <div class="p-6 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                            <div class="flex items-center">
                                <h3 class="text-red-800 font-medium">{{ Session::get('error') }}</h3>
                                <button class="ml-auto">
                                    <svg class="text-red-800" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.93341 6.00008L11.1334 1.80008C11.4001 1.53341 11.4001 1.13341 11.1334 0.866748C10.8667 0.600081 10.4667 0.600081 10.2001 0.866748L6.00008 5.06675L1.80008 0.866748C1.53341 0.600081 1.13341 0.600081 0.866748 0.866748C0.600082 1.13341 0.600082 1.53341 0.866748 1.80008L5.06675 6.00008L0.866748 10.2001C0.733415 10.3334 0.666748 10.4667 0.666748 10.6667C0.666748 11.0667 0.933415 11.3334 1.33341 11.3334C1.53341 11.3334 1.66675 11.2667 1.80008 11.1334L6.00008 6.93341L10.2001 11.1334C10.3334 11.2667 10.4667 11.3334 10.6667 11.3334C10.8667 11.3334 11.0001 11.2667 11.1334 11.1334C11.4001 10.8667 11.4001 10.4667 11.1334 10.2001L6.93341 6.00008Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="py-8 px-6">
                        <div class="p-6 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                            <div class="flex items-center">
                                <h3 class="text-green-800 font-medium">{{ Session::get('success') }}</h3>
                                <button class="ml-auto">
                                    <svg class="text-green-800" width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.93341 6.00008L11.1334 1.80008C11.4001 1.53341 11.4001 1.13341 11.1334 0.866748C10.8667 0.600081 10.4667 0.600081 10.2001 0.866748L6.00008 5.06675L1.80008 0.866748C1.53341 0.600081 1.13341 0.600081 0.866748 0.866748C0.600082 1.13341 0.600082 1.53341 0.866748 1.80008L5.06675 6.00008L0.866748 10.2001C0.733415 10.3334 0.666748 10.4667 0.666748 10.6667C0.666748 11.0667 0.933415 11.3334 1.33341 11.3334C1.53341 11.3334 1.66675 11.2667 1.80008 11.1334L6.00008 6.93341L10.2001 11.1334C10.3334 11.2667 10.4667 11.3334 10.6667 11.3334C10.8667 11.3334 11.0001 11.2667 11.1334 11.1334C11.4001 10.8667 11.4001 10.4667 11.1334 10.2001L6.93341 6.00008Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                @foreach ($vacancies as $item)
                    @php
                        $applied = \App\Models\Application::where('vacancy_id', $item->id)
                            ->where('user_id', Auth::id())->first();
                    @endphp
                    <div class="px-6 md:px-12 py-8 mb-8 bg-white border-3 border-indigo-900 rounded-2xl shadow-md">
                        <div class="md:flex justify-between items-center">
                            <h4 class="text-2xl font-extrabold mb-10 md:mb-0">{{ $item->position }}</h4>
                            @if (is_null($applied))
                                <a class="inline-block py-4 px-6 text-center leading-6 text-lg text-white font-extrabold bg-indigo-800 hover:bg-indigo-900 border-3 border-indigo-900 shadow rounded transition duration-200" href="{{ route('user-apply',$item->id) }}">
                                    apply job
                                </a>
                            @else
                                <h3 class="text-green-600"> Applied</h3>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
