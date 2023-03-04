export default {
    price: function (number) {
        return '$' + Number(number).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '\'') + '.00'
    },
}
