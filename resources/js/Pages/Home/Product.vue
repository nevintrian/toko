<template>
    <BreezeIndex>
        <div class="container py-4 flex items-center gap-3">
            <a href="../index.html" class="text-primary text-base">
                <i class="fa-solid fa-house"></i>
            </a>
        </div>
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">
            Detail Produk
        </h2>

        <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container px-5 pb-24 pt-12 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img
                        alt="ecommerce"
                        class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
                        :src="'/uploads/products/' + product.data[0].image"
                    />
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h1
                            class="text-gray-900 text-3xl title-font font-medium mb-5"
                        >
                            {{ product.data[0].name }}
                        </h1>
                        <p class="leading-relaxed">
                            Brand : {{ product.data[0].brand }}
                        </p>
                        <p class="leading-relaxed">
                            Stok : {{ product.data[0].stock }}
                        </p>
                        <p class="leading-relaxed">
                            Terjual : {{ product.data[0].sold }}
                        </p>
                        <p class="leading-relaxed">
                            Kategori : {{ product.data[0]?.category?.name }}
                        </p>
                        <p class="leading-relaxed mt-5">
                            {{ product.data[0].description }}
                        </p>

                        <div
                            class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5 mt-5"
                        ></div>
                        <div class="flex">
                            <span
                                class="title-font font-medium text-2xl text-gray-900"
                                >Rp {{ product.data[0].price }}</span
                            >
                            <a
                                :href="
                                    'https://wa.me/62' + contact.data[0].phone
                                "
                                class="flex mx-4 text-white bg-red-500 border-0 py-2 px-6 focus:outline-none transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-150 rounded"
                                >Hubungi Whatsapp</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </BreezeIndex>
</template>
<script>
import BreezeIndex from "@/Layouts/Home/Index.vue";
export default {
    components: {
        BreezeIndex,
    },

    props: {
        product: Object,
        contact: Object,
    },

    methods: {},
};
</script>
