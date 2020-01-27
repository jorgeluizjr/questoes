<template>
  <div>
    <v-card>
      <v-card-text>
        <v-row justify="center">
          <v-expansion-panels
            inset
            focusable
          >
            <v-expansion-panel
              v-for="(item,i) in programas"
              :key="i"
            >
              <v-expansion-panel-header>
                {{ item.banca.no_banca }} - {{ item.orgao.no_orgao }}
              </v-expansion-panel-header>
              <v-expansion-panel-content>
                <template>
                  <v-treeview
                    :items="item.assuntos"
                    item-text="no_assunto"
                    item-children="filhos"
                    open-on-click
                  >
                    <template v-slot:label="{item}">
                      {{ item.no_assunto }}
                      <v-chip
                        v-if="item.quantidade_questoes > 0"
                        class="ma-2"
                        color="green"
                        text-color="white"
                        filter
                      >
                        {{ item.quantidade_questoes }}
                      </v-chip>
                    </template>
                  </v-treeview>
                </template>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
        </v-row>
      </v-card-text>
      <v-card-actions
        class="justify-center"
      >
        <v-btn
          color="primary"
          class="white--text mr-2"
          @click="abrirDialogPrograma()"
        >
          <v-icon
            dark
            left
          >
            add
          </v-icon>
          Novo Programa
        </v-btn>
      </v-card-actions>
    </v-card>
    <v-dialog
      v-model="dialogPrograma"
      transition="dialog-bottom-transition"
    >
      <v-card>
        <v-toolbar
          dark
          color="primary"
        >
          <v-btn
            icon
            dark
            @click="dialogPrograma = false"
          >
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title class="font-weight-normal">
            Cadastrar Programa
          </v-toolbar-title>
        </v-toolbar>
        <v-card-text>
          <v-form
            ref="form"
            v-model="valid"
            lazy-validation
            autocomplete="off"
          >
            <v-row
              row
              wrap
            >
<!--              <v-col-->
<!--                xs4-->
<!--                md="4"-->
<!--                cols="12"-->
<!--              >-->
<!--                <v-text-field-->
<!--                  v-model="programa.no_programa"-->
<!--                  name="nome"-->
<!--                  label="Nome"-->
<!--                  type="text"-->
<!--                  :rules="[rules.required]"-->
<!--                />-->
<!--              </v-col>-->
              <v-col
                xs4
                md="6"
                cols="12"
              >
                <v-select
                  v-model="programa.banca"
                  :items="bancas"
                  label="Banca"
                  item-text="no_banca"
                  return-object
                  :rules="[rules.required]"
                />
              </v-col>
              <v-col
                xs4
                md="6"
                cols="12"
              >
                <v-select
                  v-model="programa.orgao"
                  :items="orgaos"
                  label="Orgão"
                  item-text="no_orgao"
                  return-object
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer />
          <v-btn
            color="primary"
            class="white--text mr-2"
            @click="cadastrarPrograma()"
          >
            <v-icon
              dark
              left
            >
              send
            </v-icon>
            Cadastrar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';


export default {
  name: 'Lista',
  components: {},
  data() {
    return {
      dialogPrograma: false,
      valid: false,
      programa: {},
      rules: {
        required: value => !!value || 'Este campo é obrigatório',
      },
    };
  },
  computed: {
    ...mapGetters({
      programas: 'programa/programas',
      bancas: 'programa/bancas',
      orgaos: 'programa/orgaos',
    }),
  },
  mounted() {
    this.buscarBancasAction();
    this.buscarOrgaosAction();
  },
  methods: {
    ...mapActions({
      mensagemSucessoAction: 'app/setMensagemSucesso',
      buscarBancasAction: 'programa/buscarBancasAction',
      buscarOrgaosAction: 'programa/buscarOrgaosAction',
      cadastrarProgramaAction: 'programa/cadastrarProgramaAction',
    }),
    abrirDialogPrograma() {
      this.dialogPrograma = true;
    },
    cadastrarPrograma() {
      if (!this.$refs.form.validate()) {
        return;
      }
      this.mensagemSucessoAction('Programa cadastrado com sucesso');
      this.cadastrarProgramaAction(this.programa);
      this.dialogPrograma = false;
      this.programa = {};
      this.$refs.form.reset();
    },
  },
};
</script>
