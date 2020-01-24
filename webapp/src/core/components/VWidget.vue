<template>
  <div id="v-widget">
    <v-card>
      <v-toolbar
        v-if="enableHeader"
        color="transparent"
        flat
        dense
      >
        <v-toolbar-title class="font-weight-light">
          {{ title }}
        </v-toolbar-title>
        <v-spacer />
        <slot name="widget-header-action" />
      </v-toolbar>
      <v-divider v-if="enableHeader" />
      <v-card-text :class="contentBg">
        <slot name="widget-content" />
      </v-card-text>
    </v-card>
  </div>
</template>

<script>
export default {
  name: 'VWidget',
  props: {
    title: {
      type: String,
      default: '',
    },
    enableHeader: {
      type: Boolean,
      default: true,
    },
    contentBg: {
      type: String,
      default: 'white',
    },
  },

  data() {
    return {};
  },
  computed: {},
};
</script>
