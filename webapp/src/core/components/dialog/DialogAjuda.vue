<template>
  <v-dialog
    v-model="dialog"
    max-width="800px"
    @keydown.esc="response(false)"
  >
    <v-card>
      <v-card-title
        class="headline grey lighten-2"
        primary-title
      >
        {{ titulo }}
      </v-card-title>
      <v-card-text
        class="pa-4"
        v-html="mensagem"
      />
      <v-card-actions>
        <v-spacer />
        <v-btn
          color="primary"
          text
          @click="response(false)"
        >
          Ok
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
/**
   * Dialog de Confirmacao
   *
   * Como utilizar:
   * Não é necessário chamar o componente, basta chamar:
   * this.$root.$ajuda('Deseja confirmar a alteração?')
   *
   */

export default {
  name: 'DialogAjuda',
  data() {
    return {
      dialog: false,
      mensagem: null,
      titulo: null,
      resolve: null,
      reject: null,
    };
  },
  methods: {
    open(
      mensagem = '',
      titulo = 'Ajuda',
    ) {
      this.dialog = true;
      this.mensagem = mensagem;
      this.titulo = titulo;
      return new Promise((resolve, reject) => {
        this.resolve = resolve;
        this.reject = reject;
      });
    },
    response(value) {
      this.dialog = false;
      this.resolve(value);
    },
  },
};
</script>
