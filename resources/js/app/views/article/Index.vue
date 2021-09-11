<template>
  <Header>{{ page.title }}</Header>
  <div class="container">
    <template v-for="article of articles" :key="article.id">
      <router-link :to="article.url" custom v-slot="{ navigate, href }">
        <a :href="href" @click="navigate">
          <h4 class="text-lg">{{ article.title }}</h4>
        </a>
      </router-link>
    </template>
  </div>
</template>

<script>

import Header from './../../components/Header';
import { fetchEntries } from './../../services/api';
import { ref, onMounted } from 'vue'

export default {
  name: 'ArticleIndex',

  components: {
    Header,
  },

  props: {
    page: Object
  },

  setup() {
    const articles = ref({});

    const getArticles = async () => {
      articles.value = await fetchEntries('article');
    }

    onMounted(getArticles);

    return {
      articles,
      getArticles,
    }
  }
}

</script>