require('./bootstrap')

import { createApp } from 'vue'
import { createStore } from 'vuex'

import filters from './filters'

import Checkout from './components/Checkout'

const store = createStore({})

const app = createApp({})

app.config.globalProperties.$filters = filters

app.use(store)

app.component('checkout', Checkout)

app.mount('#app')
