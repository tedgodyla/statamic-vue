<template>
    <div class="bg-red" v-text="message"></div>
</template>

<script>
export default {
    name: 'Toast',

    props: {
        message: String,
    },
};
</script>