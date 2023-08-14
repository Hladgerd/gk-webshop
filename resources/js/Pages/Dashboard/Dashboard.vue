<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <AppLayout title="Shop">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Shop
            </h2>
        </template>

        <div class="py-12">
            <div class="flex">
                <div class="border-l w-4/5">
                    <div class="container flex flex-wrap mx-auto">
                        <Link :href="route('dashboard.show', product.slug)"
                              class="flex flex-col w-full p-4 rounded sm:w-1/2 md:w-1/3"
                              v-for="product in products">
                            <div class="flex justify-around bg-gray-700 py-2">
                                <span class="text-white">{{ product.name }}</span>
                                <span class="text-yellow-500">{{ product.price }}</span>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
