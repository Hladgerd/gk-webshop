<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    products: Object
});

const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete?")) {
        form.delete(route("products.destroy", id));
    }
}
</script>

<template>
    <AppLayout title="Sell">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                I want to sell these products
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div v-if="$page.props.flash.message" class="alert alert-success shadow-lg mb-5">
                    <div>
                        <span>{{ $page.props.flash.message }}</span>
                    </div>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link class="btn btn-accent" :href="route('products.create')">Add Products</Link>
                        </div>
                        <div class="relative">
                            <div class="overflow-x-auto">
                                <table class="table table-compact w-full text-center table-zebra">
                                    <thead class=" text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Name</th>
                                        <th scope="col" class="px-6 py-3">Slug</th>
                                        <th scope="col" class="px-6 py-3">Description</th>
                                        <th scope="col" class="px-6 py-3">Price</th>
                                        <th scope="col" class="px-6 py-3">Edit</th>
                                        <th scope="col" class="px-6 py-3">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(product, index) in products" :key="index"
                                        class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ product.name }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ product.slug }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ product.description }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            {{ product.price }} </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            <Link :href="route('products.edit', product.id)" class="btn btn-warning">
                                                Edit
                                            </Link>
                                        </td>
                                        <td class=" px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap ">
                                            <button @click="destroy(product)"
                                                    class="btn btn-error">Delete</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
