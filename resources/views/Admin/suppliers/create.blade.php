@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            Add Supplier
        </h2>
    </div>


    <form action="{{ route('admin.suppliers.store') }}" method="POST">

        @csrf


        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


            {{-- Name --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Supplier Name
                </label>

                <input 
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                    placeholder="Enter supplier name"
                >

                @error('name')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>



            {{-- Phone --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Phone
                </label>

                <input 
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                    placeholder="Enter phone number"
                >

            </div>



            {{-- Email --}}
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Email
                </label>

                <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                    placeholder="Enter email"
                >

                @error('email')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>



            {{-- Status --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Status
                </label>


                <select 
                    name="status"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                >

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Inactive
                    </option>

                </select>

            </div>



            {{-- Address --}}
            <div class="md:col-span-2">

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Address
                </label>


                <textarea
                    name="address"
                    rows="4"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2"
                    placeholder="Enter supplier address"
                >{{ old('address') }}</textarea>


            </div>


        </div>



        <div class="mt-6 flex gap-3">


            <button
                type="submit"
                class="rounded-lg bg-brand-500 px-5 py-2 text-white hover:bg-brand-600"
            >
                Save Supplier
            </button>


            <a 
                href="{{ route('admin.suppliers.index') }}"
                class="rounded-lg border px-5 py-2"
            >
                Cancel
            </a>


        </div>


    </form>


</div>

@endsection