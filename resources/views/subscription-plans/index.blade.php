<x-app-layout>


    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Subscription Plans') }}
            </h2>

            <a href="{{ route('subscription-plans.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Add Subscription Plan
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto">

                        <table class="w-full text-left border-collapse">

                            <thead>
                                <tr class="border-b">
                                    <th class="px-6 py-3">#</th>
                                    <th class="px-6 py-3">Name</th>
                                    <th class="px-6 py-3">Monthly Price</th>
                                    <th class="px-6 py-3 text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($plans as $plan)
                                    <tr class="border-b hover:bg-gray-50">

                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $plan->name }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ number_format($plan->monthly_price, 2) }}
                                        </td>

                                        <td class="px-6 py-4 text-right">

                                            <a href="{{ route('subscription-plans.pay', $plan->id) }}"
                                                class="text-green-600 hover:text-green-800 mr-4">
                                                Pay
                                            </a>

                                            <a href="{{ route('subscription-plans.edit', $plan->id) }}"
                                                class="text-blue-600 hover:text-blue-800 mr-4">
                                                Edit
                                            </a>

                                            <form action="{{ route('subscription-plans.destroy', $plan->id) }}"
                                                method="POST" class="inline">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this subscription plan?')"
                                                    class="text-red-600 hover:text-red-800">
                                                    Delete
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                            No subscription plans found.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>


</x-app-layout>
