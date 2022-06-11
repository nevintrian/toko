<template>
    <BreezeIndex>
         <h1 class="text-center text-2xl font-sans font-bold my-6">
            Halaman Kontak
        </h1>
        <ul class="ml-14" v-for="contact in contacts.data" :key="contact.id">
        <h1 class="text-xl font-sans ml-4 mb-2 font-bold">Hubungi kami di : </h1>
            <li class="ml-4 text-xl font-sans mb-1">Nomor : 0{{ contact.phone }} ({{ contact.name }})</li>
            <li class="ml-4 mb-4 text-xl font-sans mb-1">
            Alamat : {{ contact.address }}
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
