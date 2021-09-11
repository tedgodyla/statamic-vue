<template>
  <Header>{{ page.title }}</Header>
  <Content v-if="page" :content="page.content" />
</template>

<script>

import Header from './../../components/Header';
import Content from './../../components/Content';

export default {
  name: 'Default',

  components: {
    Header,
    Content,
  },

  props: {
    page: Object
  },
}

</script>