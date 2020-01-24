<template>
  <span
    class="text-left grey--text text--darken-4 body-1 font-weight-bold mb-1"
  >
    {{ label }}
  </span>
</template>

<script>
export default {
  name: 'SLabel',
  props: {
    label: { type: String, default: '' },
  },
};
</script>
