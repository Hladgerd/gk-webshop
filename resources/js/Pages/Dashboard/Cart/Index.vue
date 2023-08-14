<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Cart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                I want to buy these products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-4 sm:px-6 md:flex md:space-y-0 md:space-x-4 lg:px-8">
                <div class="flex-1">
                    <div class="flex flex-col items-center mb-2 md:flex-row md:justify-between">
                        <p class="text-red-600 text-2xl font-semibold" v-if="$page.props.cartCount <= 0">
                            Your cart is empty!
                        </p>
                        <p class="text-red-600 text-2xl font-semibold" v-else>
                            {{ $page.props.cartCount }} item(s) in cart
                        </p>
                        <Link :href="route('dashboard')" class="underline hover:text-red-700 transition">Continue Shopping</Link>
                    </div>
                </div>
                <div class="flex-1">

                </div>
            </div>
        </div>
    </AppLayout>
</template>
