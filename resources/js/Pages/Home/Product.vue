<template>
    <BreezeIndex>
        <h2
            class="text-center text-2xl font-medium text-gray-800 uppercase mb-6 mt-6"
        >
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
                            class="text-gray-900 text-3xl title-font font-medium mb-5 ml-5"
                        >
                            {{ product.data[0].name }}
                        </h1>

                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                            ></thead>
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                    >
                                        Brand
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ product.data[0].brand }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                    >
                                        Stok
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ product.data[0].stock }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                    >
                                        Terjual
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ product.data[0].sold }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                    >
                                        Kategori
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ product.data[0]?.category?.name }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                    >
                                        Ukuran
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ product.data[0].description }}
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                    >
                                        Harga
                                    </th>
                                    <td
                                        class="px-6 py-4 font-bold text-lg text-black"
                                    >
                                        Rp {{ product.data[0].price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div
                            class="flex items-center pb-5 border-b-2 border-gray-200 mb-5"
                        ></div>
                        <div class="flex">
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
