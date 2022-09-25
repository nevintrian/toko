<template>
    <BreezeIndex>
        <h1 class="text-center text-2xl font-sans font-bold my-6">
            Halaman About
        </h1>
        <div
            class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:max-w-2xl mb-80 mt-6"
        >
            <ul class="ml-10" v-for="about in abouts.data" :key="about.id">
                <li class="text-xl font-sans ml-8 font-bold">
                    {{ about.title }}
                </li>
                <li class="font-sans ml-8 mb-10">{{ about.content }}</li>
            </ul>
            <div class="text-center">
                <a
                    :href="'https://shopee.co.id/macnifique.collection'"
                    class="inline-block px-6 py-2.5 bg-orange-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-orange-500 hover:shadow-lg focus:bg-orange-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-slate-900 active:shadow-lg transition duration-150 ease-in-out mb-10 ml-3"
                    >Toko Shopee</a
                >
                <a
                    :href="'https://wa.me/62' + contacts.data[0].phone"
                    class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-green-500 hover:shadow-lg focus:bg-green-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-slate-900 active:shadow-lg transition duration-150 ease-in-out mb-10 ml-3"
                    >WhatsApp</a
                >
            </div>
        </div>
    </BreezeIndex>
</template>

<script>
import BreezeIndex from "@/Layouts/Home/Index.vue";
export default {
    components: {
        BreezeIndex,
    },

    props: {
        abouts: Object,
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
