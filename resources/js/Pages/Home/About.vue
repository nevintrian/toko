<template>
<BreezeIndex>
    <ul v-for="about in abouts.data" :key="about.id">
        <li>{{about.title}}</li>
        <li>{{about.content}}</li>
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

    methods: {

    },
};
</script>
