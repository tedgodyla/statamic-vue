<template>
  <div :class="fetching ? 'opacity-50 pointer-events-none' : 'opacity-100'">
    <component v-if="blueprint" v-bind:is="blueprint" :page="page"></component>
  </div>
</template>

<script>

import Default from './Default';
import Landing from './Landing';
import ArticleIndex from './../article/Index';
import { fetchEntryBySlug } from './../../services/api';
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router';
import { isArray, camelCase, upperFirst } from 'lodash';

export default {
  name: 'Page',

  components: {
    Default,
    Landing,
    ArticleIndex
  },

  setup() {
    const route = useRoute();
    const page = ref({});
    const blueprint = ref('');
    const fetching = ref(false);

    const getPage = async (slug) => {
      slug = isArray(slug) ? slug[slug.length-1] : slug;
      const data = await fetchEntryBySlug(slug, 'pages');
      blueprint.value = upperFirst(camelCase(data.blueprint.handle));
      page.value = data;
      fetching.value = false;
    }

    watch(
      () => route.params.slug,
      (slug) => fetching.value = true && getPage(!slug ? 'home' : slug),
      { immediate: true }
    );

    return {
      page,
      blueprint,
      fetching
    }
  }
}

</script>
