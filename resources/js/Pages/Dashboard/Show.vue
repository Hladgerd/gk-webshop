<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: this.product.id,
    name: this.product.name,
    slug: this.product.slug,
    details: this.product.details,
    price: this.product.price,
    disc3Pc: this.product.disc3Pc,
    disc5Pc: this.product.disc5Pc,
    quantity: 1,
});

const submit = () => {
    this.form.post(this.route('products.store', this.form));
};
</script>

<template>
    <AppLayout title="Show product">
        <div>{{ product.name }}</div>

        <div class="max-w-7xl mx-auto px-4 py-4 sm:flex sm:space-x-4 sm:px-6 lg:px-8">
            <div class="flex-1 space-y-6 my-4 sm:mt-0 sm:border-l sm:pl-4">
                <form @submit.prevent="submit">
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-semibold capitalize italic">{{ product.name }}</h2>
                        <div class="text-xl capitalize italic">
                            <span>
                                Price:
                            </span>
                            <span>
                                {{ product.price }}
                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-4 mt-4">
                        <p class="text-xl capitalize">
                            {{ product.description }}
                        </p>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="text-sm">
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </form>
                <div class="flex flex-col divide-y">
                    <div>
                        <div class="bg-gray-50 px-4 py-4 sm:px-6 lg:px-8">
                            <p>
                                {{ product.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
