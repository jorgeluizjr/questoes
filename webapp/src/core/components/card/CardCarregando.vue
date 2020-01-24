<template>
  <v-row>
    <v-col xs="12">
      <div class="text-center">
        <div class="pa-10">
          <h3 class="display-1 font-weight-light">
            {{ text }}
          </h3>
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
