<div x-data="{saveProfile(){
    console.log('Saving profile...');
}}">
    <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-6">
                    Personal Information
                </h4>
<div x-data="{saveProfile(){
    console.log('Saving profile...');
}}">
    <div class="p-5 mb-6 border border-gray-200 rounded-2xl dark:border-gray-800 lg:p-6">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
            <div>
               
<div class="grid grid-cols-1 gap-6 md:grid-cols-2">

    <!-- Name -->
    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800/50">
        <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
            Name
        </p>

        <p class="text-base font-semibold text-gray-800 dark:text-white">
            {{ auth()->user()->name }}
        </p>
    </div>


    <!-- Email -->
    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800/50">
        <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
            Email Address
        </p>

        <p class="text-base font-semibold text-gray-800 dark:text-white">
            {{ auth()->user()->email }}
        </p>
    </div>


    <!-- Phone -->
    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800/50">
        <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
            Phone
        </p>

        <p class="text-base font-semibold text-gray-800 dark:text-white">
            {{ auth()->user()->phone ?? 'Not Added' }}
        </p>
    </div>


    <!-- Role -->
    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800/50">
        <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
            Role
        </p>

        <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-700">
            {{ ucfirst(auth()->user()->role->name) }}
        </span>
    </div>


    <!-- Status -->
    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800/50">
        <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
            Status
        </p>

        @if(auth()->user()->status)

            <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-700">

                <span class="h-2 w-2 rounded-full bg-green-500"></span>

                Active

            </span>

        @else

            <span class="inline-flex items-center gap-2 rounded-full bg-red-100 px-3 py-1 text-sm font-medium text-red-700">

                <span class="h-2 w-2 rounded-full bg-red-500"></span>

                Inactive

            </span>

        @endif

    </div>

</div>


<!-- Edit Button -->

<div class="mt-6 flex justify-end">

    <button
        onclick="window.location='{{ route('admin.profile.edit') }}'"
        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200"
    >

        <svg 
            class="h-5 w-5"
            fill="currentColor"
            viewBox="0 0 18 18"
            xmlns="http://www.w3.org/2000/svg">

            <path fill-rule="evenodd" clip-rule="evenodd"
            d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z"/>
        </svg>

        Edit Profile

    </button>

</div>
    </div>
</div>
