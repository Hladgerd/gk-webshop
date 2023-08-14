<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.product.id,
    name: props.product.name,
    slug: props.product.slug,
    description: props.product.description,
    price: props.product.price,
    disc3Pc: props.product.disc3Pc,
    disc5Pc: props.product.disc5Pc,
});

const submit = () => {
    form.post(route("products.update", props.product.id));
};
</script>

<template>
    <AppLayout title="Sell">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Product
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <input type="hidden" v-model="product.id">

                        <input type="checkbox" id="my-error-modal" class="modal-toggle" v-model="form.hasErrors" />
                        <div class="modal">
                            <div class="modal-box relative">
                                <label for="my-error-modal"
                                       class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                <h3 class="text-lg font-bold">Error Message!</h3>
                                <p class="py-4">Something went wrong!</p>
                            </div>
                        </div>

                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="name"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name*</label>
                                <input type="text" v-model="form.name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required
                                       placeholder="" />
                                <div v-if="form.errors.name" class="text-sm text-red-600">
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="slug"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slug*</label>
                                <input type="text" v-model="form.slug"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required
                                       placeholder="" />
                                <div v-if="form.errors.slug" class="text-sm text-red-600">
                                    {{ form.errors.slug }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="description"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                                <textarea type="text" v-model="form.description"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                <div v-if="form.errors.description" class="text-sm text-red-600">
                                    {{ form.errors.description }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="price"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price*</label>
                                <input type="text" v-model="form.price"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required
                                       placeholder="" />
                                <div v-if="form.errors.price" class="text-sm text-red-600">
                                    {{ form.errors.price }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="disc3Pc"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Discount 3Pcs</label>
                                <input type="text" v-model="form.disc3Pc"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                       placeholder="" />
                                <div v-if="form.errors.disc3Pc" class="text-sm text-red-600">
                                    {{ form.errors.disc3Pc }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="disc5Pc"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Discount 5Pcs</label>
                                <input type="text" v-model="form.disc5Pc"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                       placeholder="" />
                                <div v-if="form.errors.disc5Pc" class="text-sm text-red-600">
                                    {{ form.errors.disc5Pc }}
                                </div>
                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                    :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

