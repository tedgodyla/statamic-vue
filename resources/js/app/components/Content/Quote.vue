<template>
  <div class="container my-12">
    <div>{{ data.quote }}</div>
    <div>- {{ data.source }}</div>
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