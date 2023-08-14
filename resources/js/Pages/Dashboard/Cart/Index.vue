<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from "@inertiajs/vue3";

const props = defineProps({
    cartItems: Object
});

const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete?")) {
        form.delete(route("cart.destroy", id));
    }
}
</script>

<template>
    <AppLayout title="Cart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                I want to buy these products
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('dashboard')" class="underline hover:text-red-700 transition">Continue Shopping</Link>
                        </div>
                        <div class="relative">
                            <div class="overflow-x-auto">
                                <table class="table table-compact w-full text-center table-zebra">
                                    <thead class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Quantity</th>
                                        <th scope="col" class="px-6 py-3">Price</th>
                                        <th scope="col" class="px-6 py-3">Discount 3pcs</th>
                                        <th scope="col" class="px-6 py-3">Discount 5pcs</th>
                                        <th scope="col" class="px-6 py-3">Edit</th>
                                        <th scope="col" class="px-6 py-3">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item, index) in cartItems" :key="index"
                                        class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ item.name }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ item.quantity }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ item.price }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ item.price }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ item.price }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            <div v-if="item.options.status === 1">
                                                <Link :href="route('cart.edit', item.id)" class="btn btn-warning">
                                                    Edit
                                                </Link>
                                            </div>
                                        </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            <div v-if="item.options.status === 1">
                                                <button @click="destroy(item)" class="btn btn-error">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mb-2">
                            <button @click="destroy(item)" class="btn btn-error">
                                Order and Pay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
