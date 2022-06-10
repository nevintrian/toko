<template>
    <BreezeIndex>
        <h1 class="ml-4 text-xl font-sans font-bold my-4">
            Ini adalah halaman contact
        </h1>
        <ul v-for="contact in contacts.data" :key="contact.id">
            <li class="ml-4 text-xl font-sans">☢ {{ contact.name }}</li>
            <li class="ml-4 text-xl font-sans">💌 {{ contact.phone }}</li>
            <li class="ml-4 mb-4 text-xl font-sans">
                💨 {{ contact.address }}
            </li>
        </ul>
    </BreezeIndex>
    <!-- <img
                    src="https://img.icons8.com/small/32/undefined/contacts.png"
                /> -->
</template>
<script>
import BreezeIndex from "@/Layouts/Home/Index.vue";
export default {
    components: {
        BreezeIndex,
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

    methods: {},
};
</script>
