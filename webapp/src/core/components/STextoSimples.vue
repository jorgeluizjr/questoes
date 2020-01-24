<template>
  <div
    v-bind="$attrs"
  >
    <s-label
      v-if="stripTags(label).length > 0"
      :label="label"
    >
      {{ label }}
    </s-label>
    <div
      v-if="texto && stripTags(texto).length > 0"
      class="text-left black--text body-1 font-regular"
      v-html="texto"
    />
    <div v-else>
      N&atilde;o informado(a)
    </div>
  </div>
</template>

<script>
import SLabel from './SLabel';

export default {
  name: 'STextoSimples',
  components: { SLabel },
  props: {
    texto: { type: [String, Number], default: '' },
    label: { type: String, default: '' },
  },
  methods: {
    stripTags(string) {
      if (typeof string !== 'string') {
        return string.toString();
      }
      return string.replace(/(<([^>]+)>)/ig, '');
    },
  },
};
</script>
