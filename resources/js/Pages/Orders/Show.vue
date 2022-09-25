<template>
    <Head title="My profile"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">

                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h6 class="text-xl font-bold text-blueGray-700 py-3">
                                Detail Penjualan
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-4">

                    <div v-show="$page.props.flash.success"
                         class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell"></i>
                        </span>
                        <span class="inline-block align-middle">
                            <b class="capitalize">Success!</b> {{ $page.props.flash.success }}
                        </span>
                    </div>

                    <BreezeValidationErrors class="mb-4"/>
                    <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="items-center w-full bg-transparent border-collapse">
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>:</th>
                                                    <td>{{ order.date }}</td>
                                                    <th>Kode Transaksi</th>
                                                    <th>:</th>
                                                    <td>{{ order.code }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>:</th>
                                                    <td>{{ order.customer_name }}</td>
                                                    <th>Total Harga</th>
                                                    <th>:</th>
                                                    <td>Rp{{ order.total_price }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="items-center w-full bg-transparent border-collapse">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(order_detail, index) in order_detail.data" :key="order_detail.id">
                                                        <td>{{ index+1 }}</td>
                                                        <td>{{ order_detail.product.name }}</td>
                                                        <td>{{ order_detail.quantity }}</td>
                                                        <td>Rp{{ order_detail.product.price }}</td>
                                                        <td>Rp{{ order_detail.subtotal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">Total</td>
                                                        <td>Rp{{ order.total_price }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Divider from "@/Components/Divider";
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Divider,
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Link
    },

    props: {
        order: Object,
        order_detail: Object,
    },


};
</script>
