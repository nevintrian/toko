<template>
    <BreezeAuthenticatedLayout>
        <div class="w-full px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h6 class="text-xl font-bold text-blueGray-700 py-3">
                                Data Pembelian
                            </h6>
                           <BreezeButtonLink :href="route('purchase.create')">Tambah</BreezeButtonLink>
                        </div>
                    </div>
                </div>


                <!-- <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-lightBlue-500">
                    <span class="inline-block align-middle">
                        Sample table page
                    </span>
                </div> -->



                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Id
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Kode Pembelian
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Tanggal
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Nama Supplier
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
                        <tr v-for="purchase in purchases.data" :key="purchase.id">
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ purchase.id }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ purchase.code }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ purchase.created_at }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ purchase.supplier_name }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ purchase.total_price }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <Link class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-3" as="button">Lihat</Link>
                                <Link :href="route('purchase.edit', purchase.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-3" as="button">Ubah</Link>
                                <Link onclick="return confirm('Apa anda yakin?')" :href="route('purchase.destroy', purchase.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-3" method="delete" as="button">Hapus</Link>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <pagination :links="purchases.links"/>

        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue'
import BreezeButtonLink from '@/Components/ButtonLink.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Pagination,
        BreezeButtonLink,
        Link
    },

    props: {
        purchases: Object,
    }
}
</script>
