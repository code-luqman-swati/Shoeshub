
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="max-w-full overflow-x-auto custom-scrollbar">
            <table class="w-full min-w-[1102px]">
                <thead>
    <tr class="border-b border-gray-100 white:border-gray-800">
        <th class="px-5 py-3 text-left">Employee</th>
        <th class="px-5 py-3 text-left">Phone</th>
        <th class="px-5 py-3 text-left">Role</th>
        <th class="px-5 py-3 text-left">Status</th>
        <th class="px-5 py-3 text-left">Created</th>
        <th class="px-5 py-3 text-center">Actions</th>
    </tr>
</thead>
              
<tbody>

@forelse($employees as $employee)

<tr class="border-b border-gray-100 dark:border-gray-800">

    {{-- Employee --}}
    <td class="px-5 py-4">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 overflow-hidden rounded-full">

                @if($employee->image)

                    <img src="{{ asset('storage/'.$employee->image) }}" alt="{{ $employee->name }}">

                @else

                    <img src="{{ asset('images/user/default-user.jpg') }}" alt="Default">

                @endif

            </div>

            <div>

                <p class="font-medium text-gray-800 dark:text-white">

                    {{ $employee->name }}

                </p>

                <p class="text-sm text-gray-500">

                    {{ $employee->email }}

                </p>

            </div>

        </div>

    </td>

    {{-- Phone --}}
    <td class="px-5 py-4">

        {{ $employee->phone }}

    </td>

    {{-- Role --}}
    <td class="px-5 py-4">

        @if($employee->role=='admin')

            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                Admin
            </span>

        @elseif($employee->role=='sales')

            <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                Sales
            </span>

        @else

            <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-medium text-purple-700">
                Inventory
            </span>

        @endif

    </td>

    {{-- Status --}}
    <td class="px-5 py-4">

        @if($employee->status)

            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                Active
            </span>

        @else

            <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                Inactive
            </span>

        @endif

    </td>

    {{-- Created --}}
    <td class="px-5 py-4">

        {{ $employee->created_at->format('d M Y') }}

    </td>

    {{-- Actions --}}
    <td class="px-5 py-4">

        <div class="flex justify-center gap-2">

            <a href="{{ route('employees.edit',$employee) }}"
                class="rounded bg-blue-500 px-3 py-1 text-white">

                Edit

            </a>

            <form action="{{ route('employees.destroy',$employee) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete Employee?')"
                    class="rounded bg-red-500 px-3 py-1 text-white">

                    Delete

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="6" class="py-8 text-center text-gray-500">

        No employees found.

    </td>

</tr>

@endforelse

</tbody>

<tbody>
                    <template x-for="order in orders" :key="order.id">
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="px-5 py-4 sm:px-6" colspan="1">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 overflow-hidden rounded-full">
                                        <img :src="order.user.image" :alt="order.user.name">
                                    </div>
                                    <div>
                                        <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90" x-text="order.user.name"></span>
                                        <span class="block text-gray-500 text-theme-xs dark:text-gray-400" x-text="order.user.role"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="order.projectName"></p>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <div class="flex -space-x-2">
                                    <template x-for="(teamImage, index) in order.team.images" :key="index">
                                        <div class="w-6 h-6 overflow-hidden border-2 border-white rounded-full dark:border-gray-900">
                                            <img :src="teamImage" alt="team member">
                                        </div>
                                    </template>
                                </div>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <p class="text-theme-xs inline-block rounded-full px-2 py-0.5 font-medium" :class="getStatusClass(order.status)" x-text="order.status"></p>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400" x-text="order.budget"></p>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</div>