<template>
    <header>
        <div v-if="items" class="flex flex-wrap justify-between container py-8">
            <router-link to="/" class="mr-8">Logo</router-link>
            <nav>
                <router-link v-for="item in items" :key="item.id" :to="item.url" custom v-slot="{ navigate, href }">
                    <a :href="href" @click="navigate" class="ml-8">{{ item.title }}</a>
                </router-link>
            </nav>
        </div>
        <template v-if="activeItem && activeItem.children.length">
            <nav class="bg-gray-200 py-8">
                <div class="container flex flex-wrap">
                    <span class="mr-8">Sub navigatie:</span>
                    <router-link class="mr-8" v-for="child in activeItem.children" :key="child.id" :to="child.url">
                        {{ child.title }}
                    </router-link>
                </div>
            </nav>
        </template>
    </header>
</template>

<script>

import { fetchNav } from './../services/api';
import { ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router';
import { isArray } from 'lodash';

export default {
    name: 'MainNav',

    setup() {
        const items = ref([]);
        const route = useRoute();

        const getNavMain = async () => {
            items.value = await fetchNav('main');
        }

        onMounted(getNavMain);

        const activeItem = computed(() => {
            const slug = isArray(route.params.slug) ? route.params.slug.join('/') : route.params.slug;
            return items.value.filter(item => item.slug === slug)[0];
        });

        return {
            route,
            items,
            getNavMain,
            activeItem,
        }
    }
};
</script>