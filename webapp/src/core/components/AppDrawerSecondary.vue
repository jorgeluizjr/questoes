<template>
  <v-navigation-drawer
    :value="secondaryDrawerGetter.model && menuAppStatusGetter"
    :clipped="secondaryDrawerGetter.clipped"
    :permanent="secondaryDrawerGetter.type === 'permanent'"
    :temporary="secondaryDrawerGetter.type === 'temporary'"
    :floating="primaryDrawerGetter.floating"
    hide-overlay
    app
    @input="toggleStatusSecondaryDrawer($event)"
  >
    <vue-perfect-scrollbar
      class="drawer-menu--scroll"
      :settings="scrollSettings"
    >
      <v-list
        dense
        expand
      >
        <v-list-item
          link
          @click="habilitarMenuPrincipal()"
        >
          <v-list-item-action>
            <v-icon>menu_open</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Menu principal</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <template v-for="item in secondaryDrawerGetter.menus">
          <!--group with subitems-->
          <v-list-group
            v-if="item.items"
            :key="item.name"
            :group="item.group"
            :prepend-icon="item.icon"
            no-action="no-action"
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <template v-for="subItem in item.items">
              <!--sub group-->
              <v-list-group
                v-if="subItem.items"
                :key="subItem.name"
                :group="subItem.group"
                sub-group
              >
                <template v-slot:activator>
                  <v-list-item-content>
                    <v-list-item-title>{{ subItem.title }}</v-list-item-title>
                  </v-list-item-content>
                </template>
                <v-list-item
                  v-for="grand in subItem.children"
                  :key="grand.name"
                  :to="!grand.href ? {name: grand.component} : null"
                  :href="grand.href"
                  link
                >
                  <v-list-item-content>
                    <v-list-item-title>{{ grand.title }}</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-group>
              <!--child item-->
              <v-list-item
                v-else
                :key="subItem.name"
                :to="!subItem.href ? {name: subItem.component, params: subItem.params } : null"
                :href="subItem.href"
                :disabled="subItem.disabled"
                :target="subItem.target"
                link
              >
                <v-list-item-content>
                  <v-list-item-title>
                    <span>{{ subItem.title }}</span>
                  </v-list-item-title>
                </v-list-item-content>
                <v-list-item-action v-if="subItem.action">
                  <v-icon :class="[subItem.actionClass || 'success--text']">
                    {{ subItem.action }}
                  </v-icon>
                </v-list-item-action>
              </v-list-item>
            </template>
          </v-list-group>
          <v-subheader
            v-else-if="item.header"
            :key="item.name"
            class="font-weight-bold"
          >
            {{ item.header }}
          </v-subheader>
          <v-divider
            v-else-if="item.divider"
            :key="item.name"
          />
          <!--top-level link-->
          <v-list-item
            v-else
            :key="item.name"
            :to="!item.href ? { name: item.component, params: item.params } : null"
            :href="item.href"
            :disabled="item.disabled"
            :target="item.target"
            rel="noopener"
            link
          >
            <v-list-item-action v-if="item.icon">
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
            <v-list-item-action v-if="item.subAction">
              <v-icon class="success--text">
                {{ item.subAction }}
              </v-icon>
            </v-list-item-action>
          </v-list-item>
        </template>
      </v-list>
    </vue-perfect-scrollbar>
  </v-navigation-drawer>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import VuePerfectScrollbar from 'vue-perfect-scrollbar';

export default {
  name: 'AppDrawerSecondary',
  components: {
    VuePerfectScrollbar,
  },

  data() {
    return {
      scrollSettings: {
        maxScrollbarLength: 160,
      },
    };
  },

  computed: {
    ...mapGetters({
      menuAppStatusGetter: 'app/menuAppStatus',
      primaryDrawerGetter: 'app/primaryDrawer',
      secondaryDrawerGetter: 'app/secondaryDrawer',
    }),
  },

  watch: {
    secondaryDrawerGetter(val) {
      if (val.model === true) {
        this.desabilitarMenuPrincipal();
      } else {
        this.resetarMenuPrincipal();
      }
    },
  },

  methods: {
    ...mapActions({
      setPrimaryDrawerAction: 'app/setPrimaryDrawer',
      setPrimaryDrawerStatusAction: 'app/setPrimaryDrawerStatus',
      setSecondaryDrawerAction: 'app/setSecondaryDrawer',
      setSecondaryDrawerStatusAction: 'app/setSecondaryDrawerStatus',
      setMenuAppStatus: 'app/setMenuAppStatus',
    }),
    desabilitarMenuPrincipal() {
      this.setPrimaryDrawerAction(Object.assign({}, this.primaryDrawerGetter, { model: false, type: 'temporary' }));
    },
    habilitarMenuPrincipal() {
      this.setPrimaryDrawerStatusAction(true);
    },
    resetarMenuPrincipal() {
      this.setPrimaryDrawerAction({
        clipped: true,
        floating: false,
        mini: false,
        model: true,
        type: '',
      });
    },
    toggleStatusSecondaryDrawer(status) {
      if (status === false && this.$vuetify.breakpoint.mdAndDown) {
        this.setMenuAppStatus(false);
      }
    },
  },
};
</script>

<style lang="sass" scoped>
  .app--secondary-drawer
    overflow: hidden
    .drawer-menu--scroll
      height: calc(100%)
      overflow: auto
</style>
