<template>
    <button :type="type" class="w-24 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded my-5 mr-3">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    },
};
</script>
