<template>
  <div class="container my-12">
    <div v-html="data.text"></div>
  </div>
</template>

<script>

export default {
  name: 'Quote',

  props: {
    data: Object
  },
}

</script>