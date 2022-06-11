<template>
    <BreezeIndex>
        <h1 class="text-center text-2xl font-sans font-bold my-6">
            Halaman FAQ
        </h1>
        <div
            class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:max-w-2xl mb-80 mt-6"
        >
            <div class="container ml-12" style="cursor: auto">
                <div class="flex flex-wrap">
                    <div
                        class="w-full mb-5"
                        v-for="faq in faqs.data"
                        :key="faq.id"
                    >
                        <button
                            @click="hideFaq"
                            class="mt-2 accordion mb-2 text-lg font-bold text-dark px-6"
                        >
                            + {{ faq.question }}
                        </button>
                        <div class="panel hidden px-6 ml-4">
                            <p
                                class="font-medium text-md text-slate-500 md:text-lg"
                            >
                                {{ faq.answer }}
                            </p>
                        </div>
                    </div>
                </div>
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
        faqs: Object,
    },

    mounted() {
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    },
};
</script>
