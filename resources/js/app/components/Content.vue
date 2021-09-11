<template>
  <component v-for="(item, key) of content" :key="key" v-bind:is="item.type" :data="item" />
</template>

<script>

import Accordion from './content/Accordion';
import Button from './content/Button';
import Cta from './content/Cta';
import Quote from './content/Quote';
import Text from './content/Text';

export default {
  name: 'Content',

  components: {
    Accordion,
    Button,
    Cta,
    Quote,
    Text,
  },

  props: {
    content: {
      type: Array,
      required: true,
    }
  },
}

</script>