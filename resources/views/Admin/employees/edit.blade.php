@extends('layouts.app')

@section('content')
<x-common.component-card
    title="Edit Employee"
    subtitle="Update employee information."
>

<form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mx-auto max-w-4xl">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-gray-900 lg:p-8">

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Employee Information
                </h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Update the employee details below.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2">

                <!-- Full Name -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $employee->name) }}"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $employee->email) }}"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                </div>

                <!-- Phone -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $employee->phone) }}"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                </div>

                <!-- Role -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Role
                    </label>

                    <select
                        name="role"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                        <option value="">Select Role</option>
                        <option value="admin" {{ old('role', $employee->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ old('role', $employee->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="customer" {{ old('role', $employee->role) == 'customer' ? 'selected' : '' }}>Customer</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Status
                    </label>

                    <select
                        name="status"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                        <option value="1" {{ old('status', $employee->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $employee->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        New Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Leave blank to keep current password"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                </div>

                <!-- Confirm Password -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="h-11 w-full rounded-lg border border-gray-300 px-4 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
                    >
                </div>

            </div>

            <div class="mt-8 flex justify-end gap-3">
                <a
                    href="{{ route('admin.employees.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-2.5 text-sm font-medium dark:border-gray-700"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-brand-600"
                >
                    Update Employee
                </button>
            </div>

        </div>
    </div>

</form>

</x-common.component-card>
@endsection