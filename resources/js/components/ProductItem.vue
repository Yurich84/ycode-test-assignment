<template>
    <div class="flex-shrink-0">
        <img :src="product.image" alt="T-Shirt in black." class="w-20 rounded-md">
    </div>

    <div class="ml-6 flex flex-1 flex-col">
        <div class="flex">
            <div class="min-w-0 flex-1">
                <h4 class="text-sm">
                    <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ $filter.price(product.name) }}</a>
                </h4>
                <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
            </div>
        </div>

        <div class="flex flex-1 items-end justify-between pt-2">
            <p class="mt-1 text-sm font-medium text-gray-900">${{ product.price }}</p>

            <div class="ml-4">
                <label for="quantity" class="sr-only">Quantity</label>
                <select v-model="num" id="quantity" name="quantity" class="rounded-md border border-gray-300 text-left text-base font-medium text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                    <option
                        v-for="(k, i) in new Array(8)"
                        :key="i"
                        :value="i+1"
                    >
                        {{ i+1 }}
                    </option>
                </select>
            </div>
        </div>
    </div>
</template>

<script setup>
import {computed} from 'vue'

const emit = defineEmits()

const props = defineProps({
    product: {
        type: Object,
        required: true,
    }
})

const num = computed({
    get: ()  => 1,
    set: value => emit('count', props.product, value),
})


</script>
