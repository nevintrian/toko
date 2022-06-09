<template>
<BreezeIndex>
    <h1>Ini adalah halaman contact</h1>
    <ul v-for="contact in contacts.data" :key="contact.id">
        <li>{{contact.name}}</li>
        <li>{{contact.phone}}</li>
        <li>{{contact.address}}</li>
    </ul>
</BreezeIndex>

</template>
<script>
import BreezeIndex from '@/Layouts/Home/Index.vue'
export default {
    components: {
        BreezeIndex
    },

    props: {
        contacts: Object,
    },

    // data() {
    //     return {
    //         user_count: this.$page.props.user_count,
    //         category_count: this.$page.props.category_count,
    //         product_count: this.$page.props.product_count,
    //         order_count: this.$page.props.order_count,
    //         purchase_count: this.$page.props.purchase_count,
    //     };
    // },

    methods: {

    },
};
</script>
