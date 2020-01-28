<template>
  <v-app-bar
    color="primary"
    fixed
    dark
    text
    app
    clipped-left
  >
    <v-toolbar-title class="ml-10">
      {{ $route.meta.title }}
    </v-toolbar-title>
    <v-spacer />
    <v-toolbar-items>
      <v-btn
        icon
        @click="handleFullScreen()"
      >
        <v-icon>fullscreen</v-icon>
      </v-btn>

      <v-menu
        offset-y
        origin="center center"
        :nudge-bottom="10"
        transition="scale-transition"
        :close-on-content-click="false"
      >
        <template v-slot:activator="{ on }">
          <v-btn
            slot="activator"
            icon
            large
            text
            v-on="on"
          >
            <v-avatar color="primary">
              <v-icon
                medium
                dark
              >
                settings
              </v-icon>
            </v-avatar>
          </v-btn>
        </template>
        <v-card>
          <v-divider />
          <v-list>
            <v-list-item
              v-for="(item, index) in items"
              :key="index"
              :href="item.href"
              ripple="ripple"
              :disabled="item.disabled"
              :target="item.target"
              rel="noopener"
              @click="item.click"
            >
              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-card>
      </v-menu>
    </v-toolbar-items>
  </v-app-bar>
</template>
<script>
import { mapGetters, mapActions } from 'vuex';
import Util from '../util';
import MxFiltros from '@/modules/shared/mixins/filters';

export default {
  name: 'AppToolbar',
  components: {
  },
  mixins: [
    MxFiltros,
  ],

  data() {
    return {
      appTitle: process.env.VUE_APP_TITLE,
      items: [
        {
          icon: 'settings',
          href: '',
          title: 'Tema',
          click: this.abrirConfiguracoesDoTema,
        },
      ],
    };
  },

  computed: {
    ...mapGetters({
      secondaryDrawerGetter: 'app/secondaryDrawer',
    }),
    toolbarColor() {
      return this.$vuetify.options.extra.mainNav;
    },
  },
  methods: {
    ...mapActions({
      toggleDrawerThemeAction: 'app/toggleDrawerTheme',
      setPrimaryDrawerStatus: 'app/setPrimaryDrawerStatus',
    }),
    handleFullScreen() {
      Util.toggleFullScreen();
    },
    abrirConfiguracoesDoTema() {
      this.toggleDrawerThemeAction(true);
    },
  },
};
</script>

<style lang="sass" scoped>
  .toolbar-logo
    display: flex
    padding: 5px
    margin-left: -18px !important
    width: 258px
    height: 64px
    position: relative
    @media #{map-get($display-breakpoints, 'sm-and-down')}
      height: 56px
      width: 122px
      margin-left: -17px !important

    .button-drawer
      position: absolute
      top: 10px
      right: -28px
      @media #{map-get($display-breakpoints, 'sm-and-down')}
        .button-drawer
          top: 4px

  .toolbar-logo
    img
      margin: 10px 15px
      height: 36px
      @media #{map-get($display-breakpoints, 'sm-and-down')}
        height: 28px
        margin-top: 10px !important

</style>
