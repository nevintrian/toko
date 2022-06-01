<template>
    <Link class="block w-24 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-5">
        <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
}
</script>
