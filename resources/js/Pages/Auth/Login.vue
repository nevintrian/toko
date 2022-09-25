<template>
    <Head title="Login"/>

<BreezeIndex>
     <div class="contain py-16 font-poppins">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-5">Login</h2>
                <BreezeValidationErrors class="mb-4"/>
                <form @submit.prevent="submit">
                    <div class="relative mb-3 w-full">
                        <BreezeLabel for="email" value="Email"/>
                        <BreezeInput id="email" type="email" v-model="form.email" required
                                     autofocus autocomplete="username"/>
                    </div>

                    <div class="relative mb-3 w-full">
                        <BreezeLabel for="password" value="Password"/>
                        <BreezeInput id="password" type="password" v-model="form.password"
                                     required autocomplete="current-password"/>
                    </div>

                    <div class="mt-6 mb-4 text-center">
                        <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }"
                                      :disabled="form.processing">
                            Log in
                        </BreezeButton>

                    </div>
                </form>
        </div>
    </div>
</BreezeIndex>

</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import BreezeIndex from '@/Layouts/Home/Index.vue'

export default {

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
        BreezeIndex
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
