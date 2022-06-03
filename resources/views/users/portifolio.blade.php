<x-app-layout>

    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                            src="{{ asset('images/user.png') }}"
                            alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $portifolio->firstname }} {{ $portifolio->lastname }}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Job Applicant</h3>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">{{ Auth::user()->created_at }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Personal Information</span>
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
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2">{{ $portifolio->firstname }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2">{{ $portifolio->lastname }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{ $portifolio->gender }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{ $portifolio->phone }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                <div class="px-4 py-2">{{ $portifolio->address }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{ $portifolio->dob }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex">
                        <button data-bs-toggle="modal" data-bs-target="#cvmodal" id="cvbtn" class="block text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                            Upload CV
                        </button>
                        <button id="expbtn" class="block text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                            Add Experience
                        </button>
                        <button id="edubtn" class="block text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                            Add Education
                        </button>
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Experience</span>
                            </div>
                            @php
                                $experience = \App\Models\Experience::where('portifolio_id', $portifolio->id)->get();
                                $education = \App\Models\Education::where('portifolio_id', $portifolio->id)->get();
                            @endphp
                            <ul class="list-inside space-y-2">
                                @foreach ($experience as $exp)
                                    <li>
                                        <div class="text-teal-600">{{ $exp->jobtitle }} at {{ $exp->company }}</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Education</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                @foreach ($education as $edu)
                                    <li>
                                        <div class="text-teal-600">{{ $edu->study }} at {{ $edu->institute }}</div>
                                        <div class="text-gray-500 text-xs">{{ $edu->started }} -
                                            @if (is_null($edu->ended))
                                                Now
                                            @else
                                                {{ $edu->ended }}
                                            @endif

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>


<!--CV Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-1/2 h-full outline-none overflow-x-hidden overflow-y-auto ml-28 mt-20 mr-20 justify-center" id="cvmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-modal="true" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-gray-500 bg-clip-padding rounded-md outline-none text-current">
            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Upload CV</h5>
                <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('user-cv') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body relative p-4">
                    @csrf
                    <div class="relative z-0 w-full mb-6">
                        <input type="file" name="file" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8" placeholder="phone" required>
                    </div>
                </div>
                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button" id="closebtn" class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener
    ('DOMContentLoaded', () => {
        const cvmodal = document.querySelector('#cvmodal')
        const cvbtn = document.querySelector('#cvbtn')
        const closebtn = document.querySelector('#closebtn')

        const expmodal = document.querySelector('#expmodal')
        const expbtn = document.querySelector('#expbtn')

        cvbtn.addEventListener('click', () => {
            cvmodal.classList.remove('hidden')
            cvmodal.classList.add('show')
        })

        closebtn.addEventListener('click', () => {
            cvmodal.classList.remove('flex')
            cvmodal.classList.add('hidden')
        })
    })
</script>
</x-app-layout>
