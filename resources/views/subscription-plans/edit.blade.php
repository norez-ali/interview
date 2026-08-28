<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subscription Plan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form action="{{ route('subscription-plans.update', $plan->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Plan Name
                            </label>

                            <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter plan name">

                            @error('name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <div class="mb-6">

                            <label for="monthly_price" class="block text-sm font-medium text-gray-700 mb-1">
                                Monthly Price
                            </label>

                            <input type="number" name="monthly_price" id="monthly_price"
                                value="{{ old('monthly_price', $plan->monthly_price) }}" step="0.01" min="0"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Enter monthly price">

                            @error('monthly_price')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <div class="flex items-center gap-3">

                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update Plan
                            </button>

                            <a href="{{ route('subscription-plans.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>


</x-app-layout>
