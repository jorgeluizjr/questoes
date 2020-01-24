<template>
  <v-text-field
    v-mask="config"
    type="text"
    :value="display"
    v-bind="$attrs"
    @focus="$emit('focus', $event)"
    @blur="$emit('blur', $event)"
    @input="onInput"
  />
</template>

<script>

// Author: https://github.com/vuejs-tips/vue-the-mask

import mask from 'vue-the-mask/src/directive';
import tokens from 'vue-the-mask/src/tokens';
import masker from 'vue-the-mask/src/masker';

export default {
  name: 'STextMask',
  directives: { mask },
  props: {
    value: [String, Number],
    mask: {
      type: [String, Array],
      required: true,
    },
    masked: { // by default emits the value unformatted, change to true to format with the mask
      type: Boolean,
      default: false, // raw
    },
    tokens: {
      type: Object,
      default: () => tokens,
    },
  },
  data() {
    return {
      lastValue: null, // avoid unecessary emit when has no change
      display: this.value,
    };
  },
  computed: {
    config() {
      return {
        mask: this.mask,
        tokens: this.tokens,
        masked: this.masked,
      };
    },
  },
  watch: {
    value(newValue) {
      if (newValue !== this.lastValue) {
        this.display = newValue;
      }
    },
    masked() {
      this.refresh(this.display);
    },
    mask() {
      this.refresh(this.display);
    },
  },
  methods: {
    onInput(e) {
      this.refresh(e);
    },

    refresh(value) {
      this.display = value;
      /* eslint-disable no-param-reassign */
      value = masker(value, this.mask, this.masked, this.tokens);
      if (value !== this.lastValue) {
        this.lastValue = value;
        this.$emit('input', value);
      }
    },
  },
};

</script>
