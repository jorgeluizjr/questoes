<template>
  <div class="themeSetting">
    <v-toolbar
      dark
      color="primary"
    >
      <v-toolbar-title>Configurações do Tema</v-toolbar-title>
    </v-toolbar>
    <v-container>
      <div class="theme-options">
        <v-subheader class="px-1 my-2">
          Modo noturno
        </v-subheader>
        <v-divider />
        <div class="my-3">
          <v-btn-toggle
            :value="theme.mode"
            @change="setModoDoTemaAction($event)"
          >
            <v-btn
              text
              value="dark"
            >
              Dark
            </v-btn>
            <v-btn
              text
              value="light"
            >
              Light
            </v-btn>
          </v-btn-toggle>
        </div>
      </div>
      <v-row column>
        <v-col>
          <v-subheader class="px-1 my-2">
            Opções de cores
          </v-subheader>
          <div class="color-option">
            <v-row wrap>
              <label
                v-for="(option, index) in themeColorOptions"
                :key="index"
                :for="index"
                class="color-option--label flex xs6 pa-1"
              >
                <input
                  :id="index"
                  v-model="themeColor"
                  type="radio"
                  name="color"
                  :value="option.key"
                  @input="alterarCor($event.target.value)"
                >
                <span class="color-option--item bg">
                  <span class="overlay">
                    <span class="material-icons">check</span>
                  </span>
                  <span
                    class="color-option--item--header sideNav"
                    :class="option.value.sideNav"
                  />
                  <span
                    class="color-option--item--header mainNav"
                    :class="option.value.mainNav"
                  />
                  <span
                    class="sideMenu"
                    :class="option.value.sideMenu"
                  />
                </span>
              </label>
            </v-row>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
import colors from 'vuetify/es5/util/colors';
import { mapGetters, mapActions } from 'vuex';

export default {
  data() {
    return {
      colors,
      themeColor: 'indigo',
    };
  },
  computed: {
    ...mapGetters({
      theme: 'app/theme',
    }),
    themeColorOptions() {
      return [
        {
          key: 'blue',
          value: {
            sideNav: 'blue',
            mainNav: 'blue',
            sideMenu: 'white',
          },
        },
        {
          key: 'teal',
          value: {
            sideNav: 'teal',
            mainNav: 'teal',
            sideMenu: 'white',
          },
        },
        {
          key: 'red',
          value: {
            sideNav: 'red',
            mainNav: 'red',
            sideMenu: 'white',
          },
        },
        {
          key: 'orange',
          value: {
            sideNav: 'orange',
            mainNav: 'orange',
            sideMenu: 'white',
          },
        },
        {
          key: 'purple',
          value: {
            sideNav: 'purple',
            mainNav: 'purple',
            sideMenu: 'white',
          },
        },
        {
          key: 'indigo',
          value: {
            sideNav: 'indigo',
            mainNav: 'indigo',
            sideMenu: 'white',
          },
        },
        {
          key: 'cyan',
          value: {
            sideNav: 'cyan',
            mainNav: 'cyan',
            sideMenu: 'white',
          },
        },
        {
          key: 'pink',
          value: {
            sideNav: 'pink',
            mainNav: 'pink',
            sideMenu: 'white',
          },
        },
        {
          key: 'green',
          value: {
            sideNav: 'green',
            mainNav: 'green',
            sideMenu: 'white',
          },
        },
      ];
    },
  },
  watch: {
    theme: {
      handler(tema) {
        this.atualizarTema(tema);
      },
      deep: true,
    },
  },
  created() {
    this.syncTemaLocalStorageAction();
    this.atualizarTema(this.theme);
  },
  methods: {
    ...mapActions({
      setModoDoTemaAction: 'app/setModoDoTema',
      setCorDoTemaAction: 'app/setCorDoTema',
      syncTemaLocalStorageAction: 'app/syncTemaLocalStorage',
    }),
    alterarCor(cor) {
      this.setCorDoTemaAction(cor);
    },
    atualizarTema(tema) {
      this.themeColor = this.theme.color;
      this.$vuetify.theme.themes.light.primary = this.colors[tema.color].base;
      this.$vuetify.theme.themes.dark.primary = this.colors[tema.color].base;
      this.$vuetify.theme.dark = tema.mode === 'dark';
    },
  },
};
</script>
<style lang="stylus" scoped>
.color-option {
  &--label {
    position: relative;
    display: block;
    cursor: pointer;

    & input[type='radio'] {
      display: none;

      &+span {
        position: relative;

        &>.overlay {
          display: none;
          position: absolute;
          top: 0;
          bottom: 0;
          right: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.3);
          text-align: center;
          line-height: 30px;
          color: #fff;
        }
      }

      &:checked+span>.overlay {
        display: block;
      }
    }

    & .bg {
      background-color: #f1f1f1;
    }
  }

  &--item {
    overflow: hidden;
    display: block;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;

    &--header {
      height: 10px;
    }

    &>span {
      display: block;
      float: left;
      width: 50%;
      height: 20px;
    }
  }
}
</style>
