require('./bootstrap')

import { createApp } from 'vue'

import filters from './filters'

import Checkout from './components/Checkout'

import store from './store'

const app = createApp({})

app.config.globalProperties.$filters = filters

app.use(store)

app.component('checkout', Checkout)

app.mount('#app')
