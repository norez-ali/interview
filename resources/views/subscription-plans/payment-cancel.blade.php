<x-app-layout>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h2 class="text-2xl font-bold text-red-600">
                    Payment Cancelled
                </h2>

                <p class="mt-3 text-gray-600">
                    Your payment was cancelled.
                </p>

                <a href="{{ route('subscription-plans.index') }}"
                    class="inline-block mt-5 px-4 py-2 bg-blue-600 text-white rounded">
                    Back to Subscription Plans
                </a>

            </div>

        </div>
    </div>

</x-app-layout>
