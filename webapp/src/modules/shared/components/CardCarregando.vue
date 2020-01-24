<template>
  <v-row column>
    <v-col xs12>
      <div class="text-xs-center">
        <div style="padding: 20px">
          <h4 v-text="text" />
        </div>
        <v-progress-circular
          :size="50"
          indeterminate
          color="primary"
        />
      </div>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'Carregando',
  props: {
    text: {
      type: String,
      default: '',
    },
  },
};
</script>
