@extends('layouts.app')

@section('content')

<div class="container mx-auto py-10">

    <h1 class="mb-8 text-3xl font-bold">
        Our Shoes
    </h1>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4">

        @forelse($shoes as $shoe)

            <div class="rounded-xl border bg-white p-4 shadow">

                <h2 class="text-xl font-semibold">
                    {{ $shoe->name }}
                </h2>

                <p class="mt-2 text-gray-500">
                    Brand:
                    {{ $shoe->brand->name }}
                </p>

                <p class="text-gray-500">
                    Category:
                    {{ $shoe->category->name }}
                </p>

                <p class="mt-3 text-lg font-bold">
                    Rs. {{ number_format($shoe->price) }}
                </p>

                <a
                    href="{{ route('shop.show', $shoe->id) }}"
                    class="mt-4 inline-block rounded-lg bg-blue-600 px-4 py-2 text-white"
                >
                    View Details
                </a>

            </div>

        @empty

            <p>No shoes found.</p>

        @endforelse

    </div>

    <div class="mt-8">
        {{ $shoes->links() }}
    </div>

</div>

@endsection