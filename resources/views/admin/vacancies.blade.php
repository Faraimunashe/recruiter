<x-app-layout>
    <section class="relative py-16 bg-blueGray-50">
        <div class="w-full mb-12 px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-gray-300 text-gray-900">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                        <h3 class="font-semibold text-lg text-gray-900">Vacancies Table</h3>
                    </div>
                    <a href="{{ route('admin-add-vacancy') }}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        New
                    </a>
                </div>
            </div>
            <div class="block w-full overflow-x-auto ">
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
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                        <tr>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-800 text-gray-300 border-gray-700">
                                Reference #
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-800 text-gray-300 border-gray-700">
                                Position
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-800 text-gray-300 border-gray-700">
                                Department
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-800 text-gray-300 border-gray-700">
                                Applications
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-gray-800 text-gray-300 border-gray-700"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $item)
                            <tr>
                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                    <span class="ml-3 font-bold text-gray-900">{{$item->ref}}</span>
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $item->position }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $item->position }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    @php
                                        $appl = \App\Models\Application::where('vacancy_id', $item->id)->count();
                                        echo $appl;
                                    @endphp
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                    <a href="{{ route('admin-delete-vacancy', $item->id) }}" class="bg-red-500 hover:bg-red-900 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        remove
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>
