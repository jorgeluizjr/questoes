<template>
  <v-card>
    <v-card-text class="pa-0">
      <v-container
        fluid
        grid-list-lg
        text-center
      >
        <s-texto-simples
          :label="label"
          :texto="texto"
        />
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>
import STextoSimples from '../STextoSimples';

export default {
  name: 'SCardTexto',
  components: { STextoSimples },
  props: {
    label: {
      type: String,
      default: '',
    },
    texto: {
      type: String,
      default: '',
    },
  },
};
</script>
