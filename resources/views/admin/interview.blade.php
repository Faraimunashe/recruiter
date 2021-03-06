<x-app-layout>
    <div class="m-20">
        <div class="block p-6 rounded-lg shadow-lg bg-white px-5">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 mb-5">
                <h3 class="font-bold text-lg text-gray-900">Invite {{ $application->lastname }} {{ $application->lastname }} to Interview</h3>
            </div>
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
            <form action="{{ route('admin-application-invite') }}" method="POST">
                @csrf
                <input type="hidden" name="application_id" value="{{ $application->id }}">
                <div class="form-group mb-6">
                    <input type="date" name="idate" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" >
                </div>
                <div class="form-group mb-6">
                    <input type="time" name="itime" required class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" >
                </div>
                <button type="submit" class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Invite to Interview
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
