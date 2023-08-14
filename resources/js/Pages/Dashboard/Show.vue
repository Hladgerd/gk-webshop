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
    quantity: '',
});

const submit = () => {
    this.form.post(this.route('cart.store', this.form));
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
                            <span>Price:</span>
                            <span>{{ product.price }}</span>
                        </div>
                        <div class="text-xl capitalize italic">
                            <span>Discount 3pcs:</span>
                            <span>{{ product.disc3Pc }}</span>
                        </div>
                        <div class="text-xl capitalize italic">
                            <span>Discount 5pcs:</span>
                            <span>{{ product.disc5Pc }}</span>
                        </div>
                    </div>
                    <div class="flex space-x-4 mt-4">
                        <p class="text-xl capitalize">
                            {{ product.description }}
                        </p>
                    </div>
                    <div class="flex space-x-4 mt-4">
                        <label for="quantity"
                               class="flex-1 text-xl capitalize">Qty:</label>
                        <input type="text" v-model="form.quantity" name="quantity"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                               placeholder="" />
                        <div v-if="form.errors.quantity" class="text-sm text-red-600">
                            {{ form.errors.quantity }}
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="text-sm">
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
