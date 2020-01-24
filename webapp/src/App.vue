<template>
  <v-app>
    <router-view />

    <!-- theme setting drawer -->
    <v-navigation-drawer
      :value="themeDrawerGetter"
      class="setting-drawer"
      temporary
      right
      hide-overlay
      fixed
      @input="toggleDrawerThemeAction($event)"
    >
      <theme-settings />
    </v-navigation-drawer>

    <!-- global snackbar -->
    <v-snackbar
      :value="snackbar.show"
      :color="snackbar.color"
      bottom
      right
    >
      {{ snackbar.text }}
      <v-btn
        dark
        text
        icon
        @click.native="snackbar.show = false"
      >
        <v-icon>close</v-icon>
      </v-btn>
    </v-snackbar>

    <!-- global modal confirm -->
    <dialog-confirmacao ref="confirm" />

    <dialog-ajuda ref="ajuda" />
  </v-app>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import ThemeSettings from '@/core/components/ThemeSettings';
import DialogConfirmacao from '@/core/components/dialog/DialogConfirmacao';
import DialogAjuda from '@/core/components/dialog/DialogAjuda';
import { eventHub } from './event';

export default {
  components: {
    DialogConfirmacao,
    ThemeSettings,
    DialogAjuda,
  },
  data() {
    return {
      snackbar: {
        show: false,
        color: 'success',
        text: '',
      },
    };
  },
  computed: {
    ...mapGetters({
      snackbarGetter: 'app/snackbar',
      themeDrawerGetter: 'app/themeDrawer',
    }),
  },
  watch: {
    snackbarGetter(val) {
      this.snackbar = Object.assign({}, val);
    },
  },
  mounted() {
    const self = this;
    /**
     * Event Bus - Criado para emitir mensagem de erro fora dos componentes Vue
     * Basta importar o arquivo event da raiz do projeto
     * Para utilizar: eventHub.$emit('eventoErro', 'Mensagem!');
     */
    eventHub.$on('eventoErro', (payload) => {
      self.notificarErro(payload);
    });

    this.$root.$confirm = this.$refs.confirm.open;
    this.$root.$dialogAjuda = this.$refs.ajuda.open;
  },
  methods: {
    ...mapActions({
      notificarErro: 'app/setMensagemErro',
      toggleDrawerThemeAction: 'app/toggleDrawerTheme',
    }),
  },
};
</script>

<style scoped>
  .setting-fab {
    top: 50% !important;
    right: 0;
    border-radius: 0;
  }
</style>
