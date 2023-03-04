<template>
    <div>
        <h2 class="sr-only">Checkout</h2>

        <form class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16" @submit.prevent="submit">
            <div>
                <div>
                    <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                    <div class="mt-4">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                        <div class="mt-1">
                            <input
                                type="email" id="email-address"
                                name="email-address"
                                autocomplete="email"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                :class="{ 'border-red-500': errors.has('email') }"
                            >
                            <p v-if="errors.has('email')" class="text-red-500 text-xs italic">
                                {{ errors.get('email') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 border-t border-gray-200 pt-10">
                    <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    id="first-name"
                                    name="first-name"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('first_name') }"
                                >
                                <p v-if="errors.has('first_name')" class="text-red-500 text-xs italic">
                                    {{ errors.get('first_name') }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    id="last-name"
                                    name="last-name"
                                    autocomplete="family-name"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('last_name') }"
                                >
                                <p v-if="errors.has('last_name')" class="text-red-500 text-xs italic">
                                    {{ errors.get('last_name') }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    autocomplete="street-address"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('address1') }"
                                >
                                <p v-if="errors.has('address1')" class="text-red-500 text-xs italic">
                                    {{ errors.get('address1') }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment, suite, etc.</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="apartment"
                                    id="apartment"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('address2') }"
                                >
                                <p v-if="errors.has('address2')" class="text-red-500 text-xs italic">
                                    {{ errors.get('address2') }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    autocomplete="address-level2"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('city') }"
                                >
                                <p v-if="errors.has('city')" class="text-red-500 text-xs italic">
                                    {{ errors.get('city') }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <div class="mt-1">
                                <select
                                    id="country"
                                    name="country"
                                    autocomplete="country-name"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('country') }"
                                >
                                    <option
                                        v-for="country in countries"
                                        :key="country"
                                        :value="country"
                                    >
                                        {{ country }}
                                    </option>
                                </select>
                                <p v-if="errors.has('country')" class="text-red-500 text-xs italic">
                                    {{ errors.get('country') }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="region"
                                    id="region"
                                    autocomplete="address-level1"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('state') }"
                                >
                                <p v-if="errors.has('state')" class="text-red-500 text-xs italic">
                                    {{ errors.get('state') }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal code</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="postal-code"
                                    id="postal-code"
                                    autocomplete="postal-code"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('zip') }"
                                >
                                <p v-if="errors.has('zip')" class="text-red-500 text-xs italic">
                                    {{ errors.get('zip') }}
                                </p>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    autocomplete="tel"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    :class="{ 'border-red-500': errors.has('phone') }"
                                >
                                <p v-if="errors.has('phone')" class="text-red-500 text-xs italic">
                                    {{ errors.get('phone') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order summary -->
            <order-summary>
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <button
                        type="submit"
                        :disabled="loading"
                        class="w-full rounded-md border border-transparent bg-indigo-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                    >Submit order</button>
                </div>
            </order-summary>
        </form>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue'
import store from '../store'
import OrderSummary from './OrderSummary.vue'
import {useErrors} from '../composables/errors'

const errors = useErrors()

const countries = [
    'United States',
    'Canada',
]

const loading = ref(false)

const products = computed(() => store.getters['products/products'])

const shipping = computed(() => store.getters['products/shipping'])

const subtotal = computed(() => store.getters['products/subtotal'])

const total = computed(() => store.getters['products/total'])

function submit(e) {
    const form = {
        email: e.target.elements['email-address'].value,
        first_name: e.target.elements['first-name'].value,
        last_name: e.target.elements['last-name'].value,
        address1: e.target.elements['address'].value,
        address2: e.target.elements['apartment'].value,
        city: e.target.elements['city'].value,
        country: e.target.elements['country'].value,
        state: e.target.elements['region'].value,
        zip: e.target.elements['postal-code'].value,
        phone: e.target.elements['phone'].value,
        products: products.value,
        shipping: shipping.value,
        subtotal: subtotal.value,
        total: total.value,
    }

    loading.value = true

    axios.post('api/orders', form).then(() => {
        errors.clear()
        store.dispatch('products/clearProducts')
        clearFormFields()
    }).catch(error => {
        if (error.response.data.errors) {
            errors.record(error.response.data.errors)
        }
    }).finally(() => loading.value = false)
}

function clearFormFields() {
    // TODO
}

</script>
