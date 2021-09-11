<template>
    <MainNav/>
    <router-view/>
    <!-- <Toast message="Hello world"></Toast> -->
</template>

<script>

import Toast from './components/Toast';
import MainNav from './components/MainNav';
import { fetchGlobals } from './services/api';
import { ref, onMounted } from 'vue'

export default {
    name: 'App',

    components: {
        Toast,
        MainNav,
    },

    setup() {
        const globals = ref([]);

        const getGlobals = async () => {
            globals.value = await fetchGlobals();
        }

        onMounted(getGlobals);

        return {
            globals,
            getGlobals,
        }
    }
};

</script>