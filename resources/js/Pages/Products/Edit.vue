<template>
    <Head title="My profile"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">

                <div class="px-6 py-6 mb-0 bg-white rounded-t">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            Ubah Kategori
                        </h6>
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

                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="code" value="Kode"/>
                                    <BreezeInput
                                        id="code"
                                        type="text"
                                        v-model="form.code"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="name" value="Nama"/>
                                    <BreezeInput
                                        id="name"
                                        type="text"
                                        v-model="form.name"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="category_id" value="Kategori"/>
                                    <BreezeInput
                                        id="category_id"
                                        type="number"
                                        v-model="form.category_id"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="brand" value="Brand"/>
                                    <BreezeInput
                                        id="brand"
                                        type="text"
                                        v-model="form.brand"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="stock" value="Stok"/>
                                    <BreezeInput
                                        id="stock"
                                        type="number"
                                        v-model="form.stock"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="price" value="Harga"/>
                                    <BreezeInput
                                        id="price"
                                        type="number"
                                        v-model="form.price"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="sold" value="Terjual"/>
                                    <BreezeInput
                                        id="sold"
                                        type="text"
                                        v-model="form.sold"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                   <BreezeButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Simpan
                            </BreezeButton>
                            </div>
                        </div>





                    </form>
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
import BreezeDropdown from '@/Components/Dropdown.vue'

export default {
    components: {
        Divider,
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        BreezeDropdown
    },

    data() {
        return {
            form: useForm({
                code : '',
                name : '',
                category_id : '',
                brand : '',
                stock : '',
                price : '',
                sold : ''
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('product.store'), {

            })
        },
    },
};
</script>
