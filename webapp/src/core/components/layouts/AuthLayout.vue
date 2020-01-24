<template>
  <v-app class="primary split-bg">
    <v-content>
      <v-container
        fluid
        fill-height
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            xs="12"
            sm="8"
            md="4"
            lg="4"
          >
            <v-slide-y-reverse-transition
              leave-absolute
              hide-on-leave
            >
              <router-view :key="$route.path" />
            </v-slide-y-reverse-transition>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    transitionName: 'slide-right',
  }),
  methods: {},
};
</script>
<style scoped lang="sass">
.split-bg
  height: 50%
  width: 100%
  position: absolute
  top: 0
  left: 0
  content: ""
  z-index: 0
</style>
