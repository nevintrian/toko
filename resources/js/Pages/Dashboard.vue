

<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <div class="w-full px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                <div class="px-4 py-2 mb-0 bg-white rounded-t">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            Dashboard
                        </h6>
                    </div>
                </div>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-4/12 px-4 my-4">
                        <Link :href="route('users.index')" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blueGray-700 dark:text-white">Data User</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah : {{ user_count }}</p>
                        </Link>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 my-4">
                        <Link :href="route('category.index')" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blueGray-700 dark:text-white">Data Kategori</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah : {{ category_count }}</p>
                        </Link>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 my-4">
                        <a :href="route('product.index')" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blueGray-700 dark:text-white">Data Produk</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah : {{ product_count }}</p>
                        </a>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 my-4">
                        <a :href="route('purchase.index')" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blueGray-700 dark:text-white">Data Pembelian</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah : {{ order_count }}</p>
                        </a>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 my-4">
                        <a :href="route('order.index')" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-blueGray-700 dark:text-white">Data Penjualan</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">Jumlah : {{ purchase_count }}</p>
                        </a>
                    </div>

                </div>
                <!-- <Link :href="route('category.create')" >ABC
                </Link> -->


                </div>
            </div>

        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link
    },

    data() {
        return {
            user_count: this.$page.props.user_count,
            category_count: this.$page.props.category_count,
            product_count: this.$page.props.product_count,
            order_count: this.$page.props.order_count,
            purchase_count: this.$page.props.purchase_count,
        };
    },
}
</script>
