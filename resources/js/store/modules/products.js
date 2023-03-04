export const state = {
    products: [],
    shipping: 5,
    loading: false,
}

// getters
export const getters = {
    products: state => state.products,
    shipping: state => state.shipping,
    subtotal: state => _.sumBy(state.products, 'total'),
    total: state => _.sumBy(state.products, 'total') + state.shipping,
}

// actions
export const actions = {
    async fetchProducts({commit}) {
        commit('setLoading', true)
        const {data} = await axios.get('api/products')
        commit('setProducts', data.map(p => ({...p, count: 1, total: p.price})))
        commit('setLoading', true)
    },
}

// mutations
export const mutations = {
    setProducts (state, products) {
        state.products = products
    },
    clearProducts (state) {
        state.products = []
    },
    setLoading(state, loading) {
        state.loading = loading
    },
}
