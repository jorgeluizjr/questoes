import { DefaultLayout } from '@/core/components/layouts';


export default [
  {
    path: '/programa',
    component: DefaultLayout,
    redirect: 'programa/listar',
    meta: { title: 'Programa' },
    hidden: true,
    children: [
      {
        path: 'listar',
        name: 'programa.listar',
        meta: { title: 'Programas' },
        component: () => import(/* webpackChunkName: "programa-lista" */ '@/modules/programa/views/Teste.vue'),
      },
      // {
      //   path: 'listar',
      //   name: 'responsavel.proponente.index',
      //   meta: { title: 'Listar Proponente' },
      //   component: () => import(/* webpackChunkName: "programa-proponente-lista" */ '@/modules/programa/views/proponente/Lista.vue'),
      // },
      // {
      //   path: 'cadastrar',
      //   name: 'responsavel.proponente.store',
      //   meta: { title: 'Cadastrar Proponente' },
      //   component: () => import(/* webpackChunkName: "programa-proponente-store" */ '@/modules/programa/views/proponente/Formulario.vue'),
      // },
      // {
      //   path: 'editar',
      //   name: 'responsavel.proponente.update',
      //   meta: { title: 'Editar Proponente' },
      //   component: () => import(/* webpackChunkName: "programa-proponente-update" */ '@/modules/programa/views/proponente/Formulario.vue'),
      // },
      // {
      //   path: 'visualizar',
      //   name: 'responsavel.proponente.show',
      //   meta: { title: 'Visualizar Proponente' },
      //   component: () => import(/* webpackChunkName: "programa-proponente-show" */ '@/modules/programa/views/proponente/Formulario.vue'),
      // },
    ],
  },
];
