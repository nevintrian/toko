<template>
    <Head title="Penjualan"/>
    <BreezeAuthenticatedLayout>
        <div class="w-full px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h6 class="text-xl font-bold text-blueGray-700 py-3">
                                Data Penjualan
                            </h6>
                            <div class="block w-full overflow-x-auto">
                                <div class="flex items-center justify-between">
                                <BreezeButtonLink :href="route('order.create')">Tambah</BreezeButtonLink>
                                <div>
                                    <input
                                        type="text"
                                        name="keywords"
                                        class="ml-4 mr-1 px-4 py-3 text-sm leading-4 text-gray-800 border rounded"
                                        placeholder="Search"
                                        v-model="keywords"
                                        @keyup="search" >
                                </div>
                            </div>
                            </div>

                        </div>
                        <!-- <Link :href="route('order.index')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded mr-3">Cetak Laporan</Link> -->
                    </div>
                </div>


                <div @click="hide" id="successMessage" v-show="$page.props.flash.success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell"></i>
                    </span>
                    <span class="inline-block align-middle">
                        <b class="capitalize">Success!</b> {{ $page.props.flash.success }}
                    </span>
                </div>



                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Id
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Kode Penjualan
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Tanggal
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Nama Pelanggan
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Total Harga
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="order in orders.data" :key="order.id">
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ order.id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ order.code }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ order.date }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ order.customer_name }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                Rp{{ order.total_price }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <Link :href="route('order.show', order.id)" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-3" as="button">Lihat</Link>
                                <!-- <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" as="button">Cetak</Link> -->
                                <Link onclick="return confirm('Apa anda yakin?')" :href="route('order.destroy', order.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-3" method="delete" as="button">Hapus</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <pagination :links="orders.links"/>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue'
import BreezeButtonLink from '@/Components/ButtonLink.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Head, useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Pagination,
        BreezeButtonLink,
        Link,
        Head
    },

    props: {
        orders: Object,
    },

    data() {
        return {
            keywords: ''
        };
    },


    methods: {
        submit() {
            this.form.delete(this.route('order.destroy'))
        },
        hide() {
            document.getElementById("successMessage").style.display = "none";
        },
        search() {
            this.$inertia.get("/order", { keywords: this.keywords }, { preserveState: true });
        },
    },
}
</script>
