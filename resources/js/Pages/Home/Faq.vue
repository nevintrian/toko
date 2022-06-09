<template>
<BreezeIndex>
    <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto" style="cursor: auto">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-5" v-for="faq in faqs.data" :key="faq.id" >
                    <button @click="hideFaq" class="accordion mb-2 text-lg font-bold text-dark px-6">+ {{ faq.question }}</button>
                    <div class="panel hidden px-6">
                        <p class="font-medium text-md text-dark md:text-lg">
                            {{ faq.answer }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</BreezeIndex>

</template>
<script>
import BreezeIndex from '@/Layouts/Home/Index.vue'
export default {
    components: {
        BreezeIndex
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

    props: {
        faqs: Object,
    },

    mounted() {
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    }
};
</script>
