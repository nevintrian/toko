<template>
    <BreezeIndex>
        <h1 class="text-center text-2xl font-sans font-bold my-6">
            Halaman About
        </h1>
        <ul class="ml-10" v-for="about in abouts.data" :key="about.id">
            <li class="text-xl font-sans ml-8 font-bold">
                {{ about.title }}
            </li>
            <li class="font-sans ml-8 mb-10">{{ about.content }}</li>
        </ul>
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
