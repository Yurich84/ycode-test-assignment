<template>
    <div class="mt-10 lg:mt-0">
        <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

        <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
            <h3 class="sr-only">Items in your cart</h3>
            <ul role="list" class="divide-y divide-gray-200">
                <li
                    v-for="product in products"
                    :key="product.ID"
                    class="flex py-6 px-4 sm:px-6"
                >
                    <product-item
                        :product="product"
                        @count="count"
                    />
                </li>
            </ul>
            <dl class="space-y-6 border-t border-gray-200 py-6 px-4 sm:px-6">
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Subtotal</dt>
                    <dd class="text-sm font-medium text-gray-900">{{ $filters.price(subtotal) }}</dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Shipping</dt>
                    <dd class="text-sm font-medium text-gray-900">{{ $filters.price(shipping) }}</dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-base font-medium">Total</dt>
                    <dd class="text-base font-medium text-gray-900">{{ $filters.price(total) }}</dd>
                </div>
            </dl>

            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import {computed} from 'vue'
import ProductItem from './ProductItem'
import store from '../store'

store.dispatch('products/fetchProducts')

function count(product, num) {
    product.count = num
    product.total = product.price * num
}

const products = computed(() => store.getters['products/products'])

const shipping = computed(() => store.getters['products/shipping'])

const subtotal = computed(() => store.getters['products/subtotal'])

const total = computed(() => store.getters['products/total'])

</script>
