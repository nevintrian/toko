<template>
    <Head title="My profile"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">


                <div class="rounded-t bg-white mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h6 class="text-xl font-bold text-blueGray-700 py-3">
                                Ubah User
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

                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="name" value="Name"/>
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
                                    <BreezeLabel for="email" value="Email"/>
                                    <BreezeInput
                                        id="email"
                                        type="email"
                                        class="block mt-1 w-full"
                                        v-model="form.email"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="password" value="New password"/>
                                    <BreezeInput
                                        id="password"
                                        type="password"
                                        class="block mt-1 w-full"
                                        v-model="form.password"
                                    />
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="password_confirmation" value="New password confirmation"/>
                                    <BreezeInput
                                        id="password_confirmation"
                                        type="password"
                                        class="block mt-1 w-full"
                                        v-model="form.password_confirmation"
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeButton
                                        :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing"
                                    >
                                        Simpan
                                    </BreezeButton>
                                </div>
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

export default {
    components: {
        Divider,
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
    },

    data() {
        return {
            form: useForm({
                name: this.$page.props.user['name'],
                email: this.$page.props.user['email'],
                password: null,
                password_confirmation: null,
            }),
        };
    },

    methods: {
        submit() {
            this.form.put(this.route('user.update', this.$page.props.user['id']))
        },
    },
};
</script>
