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
            <order-summary
                :loading="loading"
                v-slot="{ loading }"
            >
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <button
                        type="submit"
                        :disabled="loading"
                        class="w-full rounded-md border border-transparent bg-indigo-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                    >
                        <svg
                            v-if="loading"
                            aria-hidden="true"
                            role="status"
                            class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                        Submit order
                    </button>
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
        store.commit('products/clearProducts')
        clearFormFields(e)
    }).catch(error => {
        if (error.response.data.errors) {
            errors.record(error.response.data.errors)
        }
    }).finally(() => loading.value = false)
}

function clearFormFields(e) {
    e.target.elements['email-address'].value = ''
    e.target.elements['first-name'].value = ''
    e.target.elements['last-name'].value = ''
    e.target.elements['address'].value = ''
    e.target.elements['apartment'].value = ''
    e.target.elements['city'].value = ''
    e.target.elements['country'].value = ''
    e.target.elements['region'].value = ''
    e.target.elements['postal-code'].value = ''
    e.target.elements['phone'].value = ''
}

</script>
